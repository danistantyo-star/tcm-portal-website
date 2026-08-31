<?php
/** Halaman tidak ditemukan — supaya alamat salah tidak jatuh ke daftar berita. */
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; 404</div>
    <h1>Halaman Tidak <em>Ditemukan</em></h1>
    <p>Alamat yang Anda buka tidak ada atau sudah dipindahkan.</p>
  </div>
</section>

<section>
  <div class="wrap" style="text-align:center">
    <p class="lede">Silakan kembali ke beranda atau gunakan menu di atas.</p>
    <div style="margin-top:26px"><a class="btn btn-p" href="<?php echo esc_url( home_url('/') ); ?>">&larr; Kembali ke Beranda</a></div>
  </div>
</section>

<?php get_footer(); ?>
