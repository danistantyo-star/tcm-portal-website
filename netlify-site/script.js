/* ============================================================
 * TCM PORTAL — Scroll-driven 3D Portal Transition
 * ------------------------------------------------------------
 * - 300 frame zoom-in dirender ke <canvas> (frame swapping)
 * - Frame 1–200   : sequence zoom-in mendominasi layar
 * - Frame 201–300 : canvas fade-out, iframe TCM fade-in + scale
 * - Progress 1.0  : iframe interaktif (pointer-events: auto)
 * ============================================================ */

gsap.registerPlugin(ScrollTrigger);

/* ------------------------------------------------------------
 * KONFIGURASI
 * ---------------------------------------------------------- */
const CONFIG = {
    frameCount: 240,
    framePath: (i) =>
        `Asset Frame Hero/ezgif-frame-${String(i).padStart(3, "0")}.jpg`,

    // Jarak scroll total selama pin (px)
    scrollDistance: 3000,

    // Titik mulai transisi portal (frame 161 dari 240 → progress ~0.667)
    portalStart: 160 / 240,

    // Berapa frame pertama yang wajib termuat sebelum loader ditutup
    minFramesReady: 16,

    // Banyak gambar yang diunduh bersamaan (biar tidak rebutan bandwidth)
    concurrency: 10,
};

/* ------------------------------------------------------------
 * ELEMEN DOM
 * ---------------------------------------------------------- */
const canvas        = document.getElementById("hero-canvas");
const ctx           = canvas.getContext("2d");
const heroSection   = document.getElementById("hero-section");
const iframeSection = document.getElementById("iframe-section");
const scrollHint    = document.getElementById("scroll-hint");
const scrollCta     = document.getElementById("scroll-cta");
const loader        = document.getElementById("loader");
const loaderFill    = document.getElementById("loader-bar-fill");
const loaderPercent = document.getElementById("loader-percent");

/* ------------------------------------------------------------
 * PRELOADING FRAME SEQUENCE
 * ------------------------------------------------------------
 * Semua 300 frame dimuat di awal. Loader ditutup lebih cepat
 * (setelah minFramesReady) agar pengguna tidak menunggu lama,
 * sementara sisa frame terus dimuat di background.
 * ---------------------------------------------------------- */
const frames = new Array(CONFIG.frameCount).fill(null);
const frameLoaded = new Array(CONFIG.frameCount).fill(false);
let loadedCount = 0;
let loaderClosed = false;

function updateLoaderUI() {
    const pct = Math.round((loadedCount / CONFIG.frameCount) * 100);
    loaderFill.style.width = pct + "%";
    loaderPercent.textContent = pct + "%";
}

function maybeCloseLoader() {
    // Tutup loader saat frame awal siap ATAU semua frame selesai
    const firstFramesReady = frameLoaded
        .slice(0, CONFIG.minFramesReady)
        .every(Boolean);

    if (!loaderClosed && (firstFramesReady || loadedCount === CONFIG.frameCount)) {
        loaderClosed = true;
        loader.classList.add("hidden");
        renderFrame(0); // gambar frame pertama segera
    }
}

/**
 * Urutan prioritas pemuatan:
 *   1. Frame-frame awal (dibutuhkan begitu halaman tampil)
 *   2. "Kerangka" kasar seluruh animasi (setiap 6 frame) — jika pengguna
 *      langsung scroll cepat, frame terdekat sudah tersedia
 *   3. Sisa frame untuk kehalusan penuh
 * Diunduh bergelombang (concurrency terbatas) agar frame prioritas
 * tidak rebutan bandwidth dengan frame belakang.
 */
function buildLoadOrder() {
    const order = [];
    const seen = new Set();
    const add = (i) => {
        if (i >= 0 && i < CONFIG.frameCount && !seen.has(i)) {
            seen.add(i);
            order.push(i);
        }
    };
    for (let i = 0; i < CONFIG.minFramesReady; i++) add(i);       // tahap 1
    for (let i = 0; i < CONFIG.frameCount; i += 6) add(i);        // tahap 2
    for (let i = 0; i < CONFIG.frameCount; i++) add(i);           // tahap 3
    return order;
}

function preloadFrames() {
    const order = buildLoadOrder();
    let cursor = 0;

    const loadNext = () => {
        if (cursor >= order.length) return;
        const i = order[cursor++];
        const img = new Image();
        img.src = CONFIG.framePath(i + 1);

        img.onload = () => {
            frames[i] = img;
            frameLoaded[i] = true;
            loadedCount++;
            updateLoaderUI();
            maybeCloseLoader();

            // Jika frame yang baru termuat adalah frame yang sedang
            // dibutuhkan layar, langsung render ulang (anti-blank).
            if (i === state.currentFrame) renderFrame(i);
            loadNext();
        };

        img.onerror = () => {
            // Tandai "selesai" agar loader tidak macet jika ada file gagal
            loadedCount++;
            updateLoaderUI();
            maybeCloseLoader();
            loadNext();
        };
    };

    for (let k = 0; k < CONFIG.concurrency; k++) loadNext();
}

/* ------------------------------------------------------------
 * CANVAS RENDERING (mode "cover", tajam di layar HiDPI)
 * ------------------------------------------------------------
 * Anti-flicker: jika frame target belum termuat, cari frame
 * terdekat yang SUDAH termuat dan gambar itu — canvas tidak
 * pernah dibiarkan kosong/putih.
 * ---------------------------------------------------------- */
const state = { currentFrame: 0 };

function resizeCanvas() {
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    canvas.width  = Math.round(canvas.clientWidth * dpr);
    canvas.height = Math.round(canvas.clientHeight * dpr);

    // Resampling kualitas tertinggi saat upscale
    // (harus di-set ulang setiap kali ukuran canvas berubah)
    ctx.imageSmoothingEnabled = true;
    ctx.imageSmoothingQuality = "high";

    renderFrame(state.currentFrame);
}

function nearestLoadedFrame(target) {
    if (frameLoaded[target]) return target;
    for (let offset = 1; offset < CONFIG.frameCount; offset++) {
        if (frameLoaded[target - offset]) return target - offset;
        if (frameLoaded[target + offset]) return target + offset;
    }
    return -1; // belum ada frame sama sekali
}

function renderFrame(index) {
    const drawIndex = nearestLoadedFrame(index);
    if (drawIndex === -1) return;

    const img = frames[drawIndex];
    const cw = canvas.width;
    const ch = canvas.height;

    // Hitung skala "cover" (memenuhi layar tanpa distorsi)
    const scale = Math.max(cw / img.naturalWidth, ch / img.naturalHeight);
    const dw = img.naturalWidth * scale;
    const dh = img.naturalHeight * scale;
    const dx = (cw - dw) / 2;
    const dy = (ch - dh) / 2;

    ctx.clearRect(0, 0, cw, ch);
    ctx.drawImage(img, dx, dy, dw, dh);
}

/* ------------------------------------------------------------
 * TOGGLE INTERAKSI IFRAME
 * ---------------------------------------------------------- */
function setIframeInteractive(active) {
    iframeSection.style.pointerEvents = active ? "auto" : "none";
}

/* ------------------------------------------------------------
 * TIMELINE SCROLL (GSAP + ScrollTrigger)
 * ------------------------------------------------------------
 * Timeline dinormalisasi ke durasi 1 (progress 0 → 1):
 *   0.00 – 1.00 : frame sequence berjalan (frame 1 → 300)
 *   0.00 – 0.12 : teks scroll hint memudar & bergeser ke atas
 *   0.667 – 1.0 : canvas fade-out, iframe fade-in + scale-up
 * ---------------------------------------------------------- */
function initScrollAnimation() {
    const frameState = { frame: 0 };
    const P = CONFIG.portalStart; // 0.667

    const tl = gsap.timeline({
        defaults: { ease: "none" },
        scrollTrigger: {
            trigger: "#portal-container",
            start: "top top",
            end: `+=${CONFIG.scrollDistance}`,
            pin: true,
            scrub: 1,
            anticipatePin: 1,

            onUpdate: (self) => {
                // Aktifkan interaksi iframe hanya di ujung akhir scroll.
                // Threshold 0.995 agar tidak "flip-flop" tepat di batas.
                setIframeInteractive(self.progress >= 0.995);
            },
        },
    });

    // 1) FRAME SWAPPING — frame 1 → 300 sepanjang seluruh scroll
    tl.to(frameState, {
        frame: CONFIG.frameCount - 1,
        duration: 1,
        snap: "frame",
        onUpdate: () => {
            const f = Math.round(frameState.frame);
            if (f !== state.currentFrame) {
                state.currentFrame = f;
                renderFrame(f);
            }
        },
    }, 0);

    // 2) SCROLL HINT — headline memudar cepat di awal scroll
    tl.to(scrollHint, {
        opacity: 0,
        y: -80,
        duration: 0.12,
        ease: "power2.out",
    }, 0);

    // 2b) AJAKAN SCROLL bawah — memudar turun
    tl.to(scrollCta, {
        opacity: 0,
        y: 40,
        duration: 0.1,
        ease: "power2.out",
    }, 0);

    // 3) HERO CANVAS — fade-out perlahan (frame 201 → 300)
    tl.to(heroSection, {
        opacity: 0,
        duration: 1 - P,
        ease: "power1.inOut",
    }, P);

    // 4) IFRAME TCM — fade-in + scale-up bersamaan (frame 201 → 300)
    tl.to(iframeSection, {
        opacity: 1,
        scale: 1,
        duration: 1 - P,
        ease: "power1.out",
    }, P);
}

/* ------------------------------------------------------------
 * INIT
 * ---------------------------------------------------------- */
window.addEventListener("resize", () => {
    resizeCanvas();
    ScrollTrigger.refresh();
});

resizeCanvas();
preloadFrames();
initScrollAnimation();
