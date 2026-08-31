/* ============================================================
   Popup video pembuka (intro splash) — PT Trimitra Cipta Mandiri
   ------------------------------------------------------------
   Perilaku yang disepakati:
   - hanya di halaman Beranda (berkas ini hanya dipanggil di sana)
   - muncul otomatis, video bisu 6 detik, lalu menutup sendiri
   - sekali saja per sesi peramban (sessionStorage)
   - bisa dilewati: tombol Lewati, tombol Esc, atau klik latar

   Pengaman:
   - autoplay ditolak peramban  -> tampil tombol putar manual
   - berkas video gagal dimuat  -> lapisan langsung ditutup
   - video tidak jalan dalam 3,5 detik -> lapisan ditutup sendiri
   - pengguna memilih "kurangi gerak" -> lapisan tidak ditampilkan

   Pemanggilan (di dalam <head>, TANPA atribut defer):
     <link rel="stylesheet" href="aset/video-popup.css">
     <script src="aset/video-popup.js"></script>

   Pengaturan — tiga cara, urut prioritas:

   1. Objek window.TCM_VIDEO_POPUP (dipakai versi WordPress, karena alamat
      berkas di WordPress tidak sebidang dengan berkas skrip ini):
        window.TCM_VIDEO_POPUP = {
          aktif: true, sekali: true,
          video: 'https://.../logo.mp4',
          webm:  '',           // kosongkan kalau tidak ada
          poster:'https://.../poster.jpg'
        };
   2. Atribut pada tag <script>:
        data-video="aset/video-lain.mp4"   ganti berkas video
        data-sekali="tidak"                selalu tampil (untuk peragaan)
        data-webm="ya"                     pasang cadangan WebM VP9
   3. Kalau keduanya tidak ada, berkas dicari sebidang dengan skrip ini.
   ============================================================ */
(function () {
  'use strict';

  var skrip = document.currentScript;
  var akar = document.documentElement;
  var ATUR = ( typeof window !== 'undefined' && window.TCM_VIDEO_POPUP ) ? window.TCM_VIDEO_POPUP : {};

  var KUNCI = 'tcm-intro-video';
  var BATAS_MULAI = 3500;   // milidetik menunggu video benar-benar jalan
  var DURASI_PUDAR = 550;   // harus sama dengan transition di CSS

  var en = (akar.lang || 'id').toLowerCase().indexOf('en') === 0;
  var teks = en
    ? { lewati: 'Skip', ket: 'The video closes by itself', putar: 'Play the video' }
    : { lewati: 'Lewati', ket: 'Video akan menutup sendiri', putar: 'Putar video' };

  /* ---------- alamat berkas video, dihitung dari alamat skrip ini ---------- */
  function folder() {
    var src = (skrip && skrip.src) || '';
    return src ? src.replace(/[^\/]*$/, '') : 'aset/';
  }

  function alamatVideo() {
    if (ATUR.video) return ATUR.video;
    var custom = skrip && skrip.getAttribute('data-video');
    return custom ? custom : folder() + 'tcmlogo3d1080p.mp4';
  }

  // Cadangan WebM hanya dipasang bila diminta lewat data-webm="ya".
  // MP4 H.264 sudah didukung semua peramban arus utama (Chrome, Edge,
  // Firefox, Safari), jadi berkas cadangan tidak disertakan secara
  // baku agar paket tetap ringan.
  function alamatWebm() {
    if (typeof ATUR.webm === 'string') return ATUR.webm;
    var w = skrip && skrip.getAttribute('data-webm');
    if (!w || w === 'tidak') return '';
    return w === 'ya' ? folder() + 'tcmlogo3d720p.webm' : w;
  }

  function alamatPoster() {
    if (typeof ATUR.poster === 'string') return ATUR.poster;
    return folder() + 'tcmlogo3d-poster.jpg';
  }

  /* ---------- apakah perlu ditampilkan? ---------- */
  function perluTampil() {
    if (ATUR.aktif === false) return false;

    var sekali = (typeof ATUR.sekali === 'boolean')
      ? ATUR.sekali
      : !(skrip && skrip.getAttribute('data-sekali') === 'tidak');

    try {
      if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return false;
    } catch (e) { /* abaikan */ }

    try {
      var k = navigator.connection;
      if (k && k.saveData) return false;              // mode hemat data
    } catch (e) { /* abaikan */ }

    if (!sekali) return true;

    try {
      if (window.sessionStorage.getItem(KUNCI) === '1') return false;
    } catch (e) { /* penyimpanan diblokir — tetap tampilkan */ }

    return true;
  }

  if (!perluTampil()) return;

  /* ---------- tutup halaman lebih dulu supaya tidak berkedip ---------- */
  akar.classList.add('tcm-vp-pre', 'tcm-vp-lock');

  try { window.sessionStorage.setItem(KUNCI, '1'); } catch (e) { /* abaikan */ }

  /* ---------- bangun lapisan setelah DOM siap ---------- */
  function bangun() {
    var fokusSebelumnya = document.activeElement;

    var lapis = document.createElement('div');
    lapis.className = 'tcm-vp';
    lapis.setAttribute('role', 'dialog');
    lapis.setAttribute('aria-modal', 'true');
    lapis.setAttribute('tabindex', '-1');
    lapis.setAttribute('aria-label', en ? 'Company logo animation' : 'Animasi logo perusahaan');

    lapis.innerHTML =
      '<div class="tcm-vp__frame">' +
        '<video class="tcm-vp__video" muted playsinline autoplay preload="auto"' +
          (alamatPoster() ? ' poster="' + alamatPoster() + '"' : '') + '>' +
          '<source src="' + alamatVideo() + '" type="video/mp4">' +
          (alamatWebm() ? '<source src="' + alamatWebm() + '" type="video/webm">' : '') +
        '</video>' +
        '<button type="button" class="tcm-vp__putar" aria-label="' + teks.putar + '">' +
          '<span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg></span>' +
        '</button>' +
        '<button type="button" class="tcm-vp__tutup">' + teks.lewati +
          '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">' +
            '<path d="M5 5l14 14M19 5L5 19"/></svg>' +
        '</button>' +
        '<i class="tcm-vp__bar" aria-hidden="true"></i>' +
      '</div>' +
      '<p class="tcm-vp__ket">' + teks.ket + '</p>';

    document.body.appendChild(lapis);
    akar.classList.remove('tcm-vp-pre');   // lapisan asli sudah menutupi layar

    var video = lapis.querySelector('.tcm-vp__video');
    var bar = lapis.querySelector('.tcm-vp__bar');
    var tombolTutup = lapis.querySelector('.tcm-vp__tutup');
    var tombolPutar = lapis.querySelector('.tcm-vp__putar');

    var sudahTutup = false;
    var jagaMulai = null;

    function tutup() {
      if (sudahTutup) return;
      sudahTutup = true;
      clearTimeout(jagaMulai);
      document.removeEventListener('keydown', padaTombol, true);

      try { video.pause(); } catch (e) { /* abaikan */ }

      lapis.classList.add('is-out');
      window.setTimeout(function () {
        if (lapis.parentNode) lapis.parentNode.removeChild(lapis);
        akar.classList.remove('tcm-vp-lock', 'tcm-vp-pre');
        if (fokusSebelumnya && fokusSebelumnya.focus) {
          try { fokusSebelumnya.focus(); } catch (e) { /* abaikan */ }
        }
      }, DURASI_PUDAR);
    }

    function padaTombol(ev) {
      if (ev.key === 'Escape' || ev.key === 'Esc') {
        ev.preventDefault();
        tutup();
        return;
      }
      // jerat fokus: selama lapisan terbuka hanya tombol Lewati yang dapat difokus
      if (ev.key === 'Tab') {
        ev.preventDefault();
        tombolTutup.focus();
      }
    }

    document.addEventListener('keydown', padaTombol, true);
    tombolTutup.addEventListener('click', tutup);

    // klik latar (di luar bingkai video) ikut menutup
    lapis.addEventListener('click', function (ev) {
      if (ev.target === lapis || ev.target.classList.contains('tcm-vp__ket')) tutup();
    });

    // video selesai -> menutup sendiri
    video.addEventListener('ended', tutup);

    // berkas video bermasalah -> jangan menghalangi pengunjung.
    // Pada <video> bersumber ganda, kegagalan sumber terakhir adalah
    // tanda paling andal bahwa tidak ada berkas yang bisa diputar.
    // Alih-alih langsung lenyap (yang terlihat seperti "popup tidak
    // pernah ada" — mis. di WordPress Playground yang tidak melayani
    // permintaan Range untuk video), gambar poster ditampilkan sebentar
    // supaya jelas popupnya hidup, baru lapisan ditutup.
    var TUNGGU_POSTER = 1800;
    function gagal() {
      if (sudahTutup) return;
      clearTimeout(jagaMulai);
      var poster = alamatPoster();
      if (!poster) { tutup(); return; }
      lapis.classList.add('is-gagal');
      var bingkai = lapis.querySelector('.tcm-vp__frame');
      if (bingkai) bingkai.style.backgroundImage = 'url("' + poster + '")';
      window.setTimeout(tutup, TUNGGU_POSTER);
    }
    video.addEventListener('error', gagal);
    var sumber = video.querySelectorAll('source');
    if (sumber.length) {
      sumber[sumber.length - 1].addEventListener('error', gagal);
    }

    // bilah kemajuan
    video.addEventListener('timeupdate', function () {
      if (!video.duration || !isFinite(video.duration)) return;
      bar.style.width = Math.min(100, (video.currentTime / video.duration) * 100) + '%';
    });

    // pengaman: bila video belum juga berjalan sampai BATAS_MULAI,
    // tampilkan poster sebentar lalu tutup
    jagaMulai = window.setTimeout(function () {
      if (video.currentTime === 0 || video.paused) gagal();
    }, BATAS_MULAI);

    video.addEventListener('playing', function () {
      clearTimeout(jagaMulai);
      lapis.classList.remove('is-manual');
    });

    // coba putar; bila ditolak peramban, tampilkan tombol putar manual
    function coba() {
      var janji = video.play();
      if (janji && typeof janji.catch === 'function') {
        janji.catch(function () {
          clearTimeout(jagaMulai);
          lapis.classList.add('is-manual');
        });
      }
    }

    tombolPutar.addEventListener('click', function () {
      lapis.classList.remove('is-manual');
      coba();
    });

    coba();
    // fokus diarahkan ke lapisan, bukan ke tombol, supaya cincin fokus
    // tidak terlihat saat halaman baru dibuka; tombol Tab tetap dijerat
    try { lapis.focus({ preventScroll: true }); } catch (e) { lapis.focus(); }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bangun);
  } else {
    bangun();
  }
})();
