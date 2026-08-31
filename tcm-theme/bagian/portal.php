<?php
/**
 * Portal pembuka beranda — overlay animasi frame yang "menembus"
 * ke beranda saat discroll. Gaya & logika di assets/portal/.
 * Dipasang dari front-page.php, hanya saat tcm_portal_aktif().
 */
?>
<div id="tcm-portal-loader" aria-hidden="true">
  <div class="tcm-portal-loader-inner">
    <div class="tcm-portal-loader-logo">TCM</div>
    <div class="tcm-portal-loader-bar"><div class="tcm-portal-loader-fill" id="tcm-portal-fill"></div></div>
    <div class="tcm-portal-loader-persen" id="tcm-portal-persen">0%</div>
  </div>
</div>

<div id="tcm-portal-spacer" aria-hidden="true"></div>

<div id="tcm-portal" aria-hidden="true">
  <canvas id="tcm-portal-canvas"></canvas>

  <div id="tcm-portal-hint">
    <p class="tcm-portal-judul">
      <span class="tcm-portal-kata"><em class="tcm-portal-aksen">Welcome</em> to</span>
      <span class="tcm-portal-kata tcm-portal-nama">Trimitra Cipta Mandiri</span>
    </p>
  </div>

  <div id="tcm-portal-cta">
    <p class="tcm-portal-sub">Scroll to begin the journey</p>
    <div class="tcm-portal-panah">
      <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 4v16m0 0l-6-6m6 6l6-6" stroke="currentColor" stroke-width="1.5"
              stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
  </div>
</div>
