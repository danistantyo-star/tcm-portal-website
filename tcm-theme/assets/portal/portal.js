/* ============================================================
 * PORTAL PEMBUKA — Trimitra Cipta Mandiri (versi WordPress)
 * ------------------------------------------------------------
 * Overlay animasi frame di atas beranda asli (tanpa iframe):
 *   - #tcm-portal-spacer memberi ruang scroll sepanjang animasi
 *   - #tcm-portal (fixed, fullscreen) merender frame ke canvas
 *   - Sepertiga terakhir scroll: overlay memudar → beranda asli
 *     yang ada di belakangnya muncul dan langsung interaktif
 * Konfigurasi dikirim WordPress lewat objek window.TCM_PORTAL:
 *   { base: url folder frame, count: jumlah frame }
 * ============================================================ */
(function () {
    "use strict";

    var cfg    = window.TCM_PORTAL || {};
    var COUNT  = parseInt(cfg.count, 10) || 120;
    var BASE   = cfg.base || "";

    var loader = document.getElementById("tcm-portal-loader");
    var portal = document.getElementById("tcm-portal");
    var spacer = document.getElementById("tcm-portal-spacer");
    var canvas = document.getElementById("tcm-portal-canvas");
    var hint   = document.getElementById("tcm-portal-hint");
    var cta    = document.getElementById("tcm-portal-cta");
    var fill   = document.getElementById("tcm-portal-fill");
    var persen = document.getElementById("tcm-portal-persen");

    if (!portal || !canvas || !spacer) { return; }

    /* Singkirkan seluruh elemen portal (fallback aman) */
    function matikanPortal() {
        [loader, portal, spacer].forEach(function (el) {
            if (el && el.parentNode) { el.parentNode.removeChild(el); }
        });
    }

    /* Tanpa GSAP atau saat pengguna menonaktifkan animasi → beranda biasa */
    if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
        matikanPortal();
        return;
    }
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        matikanPortal();
        return;
    }

    gsap.registerPlugin(ScrollTrigger);

    var ctx = canvas.getContext("2d");
    var state = { currentFrame: 0 };

    var MIN_READY    = 10; // frame awal yang wajib siap sebelum loader ditutup
    var CONCURRENCY  = 10; // unduhan gambar bersamaan

    /* --------------------------------------------------- preload frame */
    var frames      = new Array(COUNT).fill(null);
    var frameLoaded = new Array(COUNT).fill(false);
    var loadedCount = 0;
    var loaderClosed = false;

    function pathFrame(n) {
        var s = String(n);
        while (s.length < 3) { s = "0" + s; }
        return BASE + "frame-" + s + ".webp";
    }

    function updateLoaderUI() {
        var pct = Math.round((loadedCount / COUNT) * 100);
        if (fill)   { fill.style.width = pct + "%"; }
        if (persen) { persen.textContent = pct + "%"; }
    }

    function tutupLoader() {
        if (loaderClosed) { return; }
        loaderClosed = true;
        if (loader) { loader.classList.add("tcm-hidden"); }
        renderFrame(state.currentFrame);
    }

    function cekLoader() {
        var awalSiap = true;
        for (var i = 0; i < MIN_READY; i++) {
            if (!frameLoaded[i]) { awalSiap = false; break; }
        }
        if (awalSiap || loadedCount === COUNT) { tutupLoader(); }
    }

    /* Urutan prioritas: frame awal → kerangka kasar (tiap 6) → sisanya */
    function urutanMuat() {
        var order = [], seen = {};
        function add(i) {
            if (i >= 0 && i < COUNT && !seen[i]) { seen[i] = true; order.push(i); }
        }
        for (var a = 0; a < MIN_READY; a++) { add(a); }
        for (var b = 0; b < COUNT; b += 6) { add(b); }
        for (var c = 0; c < COUNT; c++)    { add(c); }
        return order;
    }

    function preloadFrames() {
        var order = urutanMuat();
        var cursor = 0;

        function next() {
            if (cursor >= order.length) { return; }
            var i = order[cursor++];
            var img = new Image();
            img.src = pathFrame(i + 1);
            img.onload = function () {
                frames[i] = img;
                frameLoaded[i] = true;
                loadedCount++;
                updateLoaderUI();
                cekLoader();
                if (i === state.currentFrame) { renderFrame(i); }
                next();
            };
            img.onerror = function () {
                loadedCount++;
                updateLoaderUI();
                cekLoader();
                next();
            };
        }
        for (var k = 0; k < CONCURRENCY; k++) { next(); }
    }

    /* ------------------------------------------------ render ke canvas */
    function resizeCanvas() {
        var dpr = Math.min(window.devicePixelRatio || 1, 2);
        canvas.width  = Math.round(canvas.clientWidth * dpr);
        canvas.height = Math.round(canvas.clientHeight * dpr);
        ctx.imageSmoothingEnabled = true;
        ctx.imageSmoothingQuality = "high";
        renderFrame(state.currentFrame);
    }

    function frameTerdekat(target) {
        if (frameLoaded[target]) { return target; }
        for (var o = 1; o < COUNT; o++) {
            if (frameLoaded[target - o]) { return target - o; }
            if (frameLoaded[target + o]) { return target + o; }
        }
        return -1;
    }

    function renderFrame(index) {
        var i = frameTerdekat(index);
        if (i === -1) { return; }
        var img = frames[i];
        var cw = canvas.width, ch = canvas.height;
        var scale = Math.max(cw / img.naturalWidth, ch / img.naturalHeight);
        var dw = img.naturalWidth * scale, dh = img.naturalHeight * scale;
        ctx.clearRect(0, 0, cw, ch);
        ctx.drawImage(img, (cw - dw) / 2, (ch - dh) / 2, dw, dh);
    }

    /* ------------------------------------------- timeline scroll GSAP */
    function initScroll() {
        var frameState = { frame: 0 };
        var P = 2 / 3; // titik mulai overlay memudar (≈ frame 80 dari 120)

        var tl = gsap.timeline({
            defaults: { ease: "none" },
            scrollTrigger: {
                trigger: spacer,
                start: "top top",
                end: "bottom top",
                scrub: 1,
                onUpdate: function (self) {
                    // Di ujung animasi: sembunyikan overlay sepenuhnya agar
                    // beranda bisa diklik; muncul lagi saat scroll ke atas.
                    var selesai = self.progress >= 0.995;
                    portal.style.visibility    = selesai ? "hidden" : "visible";
                    portal.style.pointerEvents = selesai ? "none" : "auto";
                },
            },
        });

        // 1) Ganti frame sepanjang seluruh scroll
        tl.to(frameState, {
            frame: COUNT - 1,
            duration: 1,
            snap: "frame",
            onUpdate: function () {
                var f = Math.round(frameState.frame);
                if (f !== state.currentFrame) {
                    state.currentFrame = f;
                    renderFrame(f);
                }
            },
        }, 0);

        // 2) Headline memudar cepat di awal
        if (hint) {
            tl.to(hint, { opacity: 0, y: -80, duration: 0.12, ease: "power2.out" }, 0);
        }

        // 3) Ajakan scroll memudar turun
        if (cta) {
            tl.to(cta, { opacity: 0, y: 40, duration: 0.1, ease: "power2.out" }, 0);
        }

        // 4) Sepertiga terakhir: overlay memudar → beranda asli muncul
        tl.to(portal, { opacity: 0, duration: 1 - P, ease: "power1.inOut" }, P);
    }

    /* ------------------------------------------------------------ init */
    // Kalau halaman dibuka sudah dalam keadaan ter-scroll jauh (mis. reload
    // di tengah halaman), jangan biarkan loader menghalangi.
    if (window.pageYOffset > spacer.offsetHeight) { tutupLoader(); }

    window.addEventListener("resize", function () {
        resizeCanvas();
        ScrollTrigger.refresh();
    });

    resizeCanvas();
    preloadFrames();
    initScroll();
})();
