/* ============================================================
   Tema HUT ke-26 PT Trimitra Cipta Mandiri — pengendali
   ------------------------------------------------------------
   Tiga tugas: (1) pasang/lepas kelas "hut" di <body>;
   (2) sisipkan pita pengumuman dan lambang 26 di kepala;
   (3) sakelar pratinjau (hanya untuk masa peninjauan).

   Di WordPress nomor 1 dan 3 tidak dipakai: kelas "hut" datang
   dari body_class(), pita dan lambang ditulis di header.php,
   dan berkas ini boleh dibuang.
   ============================================================ */
(function () {
  'use strict';

  var KUNCI = 'tcm-tema-hut';
  var en = (document.documentElement.lang || 'id').toLowerCase().indexOf('en') === 0;

  var LAMBANG = '<svg viewBox="0 0 120 120" role="img" aria-label="26 Tahun — 2000-2026" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="hutg26h" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#F3DA85"/><stop offset=".55" stop-color="#D4AF37"/><stop offset="1" stop-color="#8F7318"/></linearGradient></defs><g fill="url(#hutg26h)"><path d="M55.3 102.75 A 45 45 0 0 1 24.54 30.3" fill="none" stroke="#C9A227" stroke-width="1.15" stroke-linecap="round"/><path transform="translate(55.3 102.75) rotate(220)" d="M0 0 C 3.57 -4.08, 8.36 -2.12, 10.2 0 C 8.36 2.12, 3.57 4.08, 0 0 Z"/><path transform="translate(43.69 99.94) rotate(175.25)" d="M0 0 C 3.42 -3.91, 8.02 -2.03, 9.77 0 C 8.02 2.03, 3.42 3.91, 0 0 Z"/><path transform="translate(33.23 94.17) rotate(250.5)" d="M0 0 C 3.27 -3.74, 7.67 -1.94, 9.35 0 C 7.67 1.94, 3.27 3.74, 0 0 Z"/><path transform="translate(24.66 85.86) rotate(205.75)" d="M0 0 C 3.12 -3.57, 7.32 -1.86, 8.92 0 C 7.32 1.86, 3.12 3.57, 0 0 Z"/><path transform="translate(18.58 75.58) rotate(281)" d="M0 0 C 2.97 -3.4, 6.97 -1.77, 8.5 0 C 6.97 1.77, 2.97 3.4, 0 0 Z"/><path transform="translate(15.41 64.07) rotate(236.25)" d="M0 0 C 2.83 -3.23, 6.62 -1.68, 8.07 0 C 6.62 1.68, 2.83 3.23, 0 0 Z"/><path transform="translate(15.38 52.13) rotate(311.5)" d="M0 0 C 2.68 -3.06, 6.27 -1.59, 7.65 0 C 6.27 1.59, 2.68 3.06, 0 0 Z"/><path transform="translate(18.5 40.6) rotate(266.75)" d="M0 0 C 2.53 -2.89, 5.92 -1.5, 7.22 0 C 5.92 1.5, 2.53 2.89, 0 0 Z"/><path transform="translate(24.54 30.3) rotate(342)" d="M0 0 C 2.38 -2.72, 5.58 -1.41, 6.8 0 C 5.58 1.41, 2.38 2.72, 0 0 Z"/><path d="M64.7 102.75 A 45 45 0 0 0 95.46 30.3" fill="none" stroke="#C9A227" stroke-width="1.15" stroke-linecap="round"/><path transform="translate(64.7 102.75) rotate(28)" d="M0 0 C 3.57 -4.08, 8.36 -2.12, 10.2 0 C 8.36 2.12, 3.57 4.08, 0 0 Z"/><path transform="translate(76.31 99.94) rotate(-47.25)" d="M0 0 C 3.42 -3.91, 8.02 -2.03, 9.77 0 C 8.02 2.03, 3.42 3.91, 0 0 Z"/><path transform="translate(86.77 94.17) rotate(-2.5)" d="M0 0 C 3.27 -3.74, 7.67 -1.94, 9.35 0 C 7.67 1.94, 3.27 3.74, 0 0 Z"/><path transform="translate(95.34 85.86) rotate(-77.75)" d="M0 0 C 3.12 -3.57, 7.32 -1.86, 8.92 0 C 7.32 1.86, 3.12 3.57, 0 0 Z"/><path transform="translate(101.42 75.58) rotate(-33)" d="M0 0 C 2.97 -3.4, 6.97 -1.77, 8.5 0 C 6.97 1.77, 2.97 3.4, 0 0 Z"/><path transform="translate(104.59 64.07) rotate(-108.25)" d="M0 0 C 2.83 -3.23, 6.62 -1.68, 8.07 0 C 6.62 1.68, 2.83 3.23, 0 0 Z"/><path transform="translate(104.62 52.13) rotate(-63.5)" d="M0 0 C 2.68 -3.06, 6.27 -1.59, 7.65 0 C 6.27 1.59, 2.68 3.06, 0 0 Z"/><path transform="translate(101.5 40.6) rotate(-138.75)" d="M0 0 C 2.53 -2.89, 5.92 -1.5, 7.22 0 C 5.92 1.5, 2.53 2.89, 0 0 Z"/><path transform="translate(95.46 30.3) rotate(-94)" d="M0 0 C 2.38 -2.72, 5.58 -1.41, 6.8 0 C 5.58 1.41, 2.38 2.72, 0 0 Z"/></g><text x="44.6" y="80" text-anchor="middle" font-family="Georgia,\'Times New Roman\',serif" font-size="58" font-weight="700" fill="url(#hutg26h)">2</text><text x="73.2" y="80" text-anchor="middle" font-family="Georgia,\'Times New Roman\',serif" font-size="58" font-weight="700" fill="none" stroke="url(#hutg26h)" stroke-width="1.9">6</text></svg>';

  var teks = en ? {
    pita   : '8 November 2026 &middot; 26th Anniversary of PT Trimitra Cipta Mandiri',
    pitaSub: 'Twenty-six years safeguarding the reliability of Indonesia&rsquo;s energy',
    sakelar: 'Preview &middot; Anniversary theme',
    hidup  : 'ON',
    mati   : 'OFF'
  } : {
    pita   : '8 November 2026 &middot; HUT ke-26 PT Trimitra Cipta Mandiri',
    pitaSub: 'Dua puluh enam tahun menjaga keandalan energi Indonesia',
    sakelar: 'Pratinjau &middot; Tema HUT',
    hidup  : 'AKTIF',
    mati   : 'NONAKTIF'
  };

  function pasangHiasan() {
    var hd = document.getElementById('hd');
    if (!hd) return;

    if (!hd.querySelector('.hut-pita')) {
      var pita = document.createElement('div');
      pita.className = 'hut-pita hut-el';
      pita.innerHTML = teks.pita + ' <span>&mdash; ' + teks.pitaSub + '</span>';
      hd.insertBefore(pita, hd.firstChild);
    }

    var bar = hd.querySelector('.bar');
    var brand = bar && bar.querySelector('.brand');
    if (brand && !bar.querySelector('.hut-lencana')) {
      var l = document.createElement('div');
      l.className = 'hut-lencana hut-el';
      l.setAttribute('aria-hidden', 'true');
      l.innerHTML = LAMBANG;
      brand.parentNode.insertBefore(l, brand.nextSibling);
    }
  }

  function pasangSakelar() {
    if (document.getElementById('hut-sakelar')) return;
    var b = document.createElement('button');
    b.id = 'hut-sakelar';
    b.type = 'button';
    b.innerHTML = '<span class="lampu"></span><u>' + teks.sakelar + '</u> <em></em>';
    b.addEventListener('click', function () { setel(!aktif()); });
    document.body.appendChild(b);
  }

  function aktif() {
    try { return localStorage.getItem(KUNCI) === '1'; } catch (e) { return false; }
  }

  function setel(nyala) {
    document.body.classList.toggle('hut', nyala);
    try { localStorage.setItem(KUNCI, nyala ? '1' : '0'); } catch (e) { /* mode privat */ }
    var em = document.querySelector('#hut-sakelar em');
    if (em) em.innerHTML = nyala ? teks.hidup : teks.mati;
  }

  function mulai() {
    pasangHiasan();
    pasangSakelar();
    setel(aktif());
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mulai);
  } else {
    mulai();
  }
})();
