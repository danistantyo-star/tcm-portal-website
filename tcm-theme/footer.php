<?php
/** Kaki halaman. Alamat & kontak diambil dari Pengaturan Tema. */
?>
<!-- FOOTER -->
<footer id="kontak">
  <div class="wrap">
    <div class="f-grid">
      <div>
        <img class="logo" src="<?php echo TCM_URI; ?>/assets/img/pt-trimitra-cipta-mandiri-2.png" alt="PT Trimitra Cipta Mandiri">
        <p><?php tcm_kaya( 'umum', 'kaki_ringkas' ); ?></p>
      </div>
      <div><h4><?php tcm_teks( 'umum', 'kaki_kol1' ); ?></h4>
        <a href="<?php echo esc_url( tcm_url( array('tentang-kami','tentang','profil'), '/tentang-kami/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l1' ); ?></a><a href="<?php echo esc_url( tcm_url( array('tentang-kami','tentang','profil'), '/tentang-kami/' ) ); ?>#visi"><?php tcm_teks( 'umum', 'f_l2' ); ?></a>
        <a href="<?php echo esc_url( home_url('/') ); ?>#grup"><?php tcm_teks( 'umum', 'f_l3' ); ?></a><a href="<?php echo esc_url( tcm_url( array('sertifikat','sertifikat-penghargaan'), '/sertifikat/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l4' ); ?></a><a href="<?php echo esc_url( tcm_url( array('karier','karir'), '/karier/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l5' ); ?></a><a href="<?php echo esc_url( tcm_url( array('sdm','sdm-human-capital','human-capital'), '/sdm/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l6' ); ?></a><a href="<?php echo esc_url( tcm_url( array('kebijakan','kebijakan-qhse'), '/kebijakan/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l7' ); ?></a></div>
      <div><h4><?php tcm_teks( 'umum', 'kaki_kol2' ); ?></h4>
        <a href="<?php echo esc_url( tcm_url( array('layanan','jasa'), '/layanan/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l8' ); ?></a><a href="<?php echo esc_url( tcm_url( array('layanan','jasa'), '/layanan/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l9' ); ?></a>
        <a href="<?php echo esc_url( tcm_url( array('layanan','jasa'), '/layanan/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l10' ); ?></a><a href="<?php echo esc_url( tcm_url( array('layanan','jasa'), '/layanan/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l11' ); ?></a>
        <a href="<?php echo esc_url( tcm_url( array('proyek','pengalaman'), '/proyek/' ) ); ?>"><?php tcm_teks( 'umum', 'f_l12' ); ?></a></div>
      <div><h4><?php tcm_teks( 'umum', 'kaki_kol3' ); ?></h4>
        <div class="f-c"><i><svg viewBox="0 0 24 24"><use href="#i-pin"/></svg></i><span><?php tcm_kaya( 'kontak', 'kantor_alamat' ); ?></span></div>
        <div class="f-c"><i><svg viewBox="0 0 24 24"><use href="#i-phone"/></svg></i><span><?php tcm_teks( 'kontak', 'kantor_telepon' ); ?></span></div>
        <div class="f-c"><i><svg viewBox="0 0 24 24"><use href="#i-mail"/></svg></i><span><?php tcm_teks( 'kontak', 'kantor_email' ); ?></span></div>
        <div class="f-c"><i><svg viewBox="0 0 24 24"><use href="#i-clock"/></svg></i><span><?php tcm_teks( 'kontak', 'kantor_jam' ); ?></span></div>
      </div>
    </div>
    <div class="f-bot">
      <span><?php tcm_teks( 'umum', 'kaki_hakcipta' ); ?></span>
      <span><?php tcm_teks( 'umum', 'kaki_legal' ); ?></span>
    </div>
  </div>
  <div class="f-strip"><i></i><i></i><i></i></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
