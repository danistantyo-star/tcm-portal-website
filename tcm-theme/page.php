<?php
/**
 * Cadangan: dipakai kalau sebuah Halaman belum dipilihkan templatenya.
 * Lebih baik menampilkan judul halaman apa adanya daripada daftar berita.
 */
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; <?php the_title(); ?></div>
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section>
  <div class="wrap" style="max-width:820px">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="tcm-isi"><?php the_content(); ?></div>
    <?php endwhile; ?>
    <?php if ( current_user_can( 'edit_pages' ) ) : ?>
      <div style="margin-top:36px;background:#FDEDE0;border:1px dashed var(--orange);
                  color:#8A4300;padding:18px 22px;border-radius:12px;font-size:14px;line-height:1.7">
        <b>Catatan untuk pengelola:</b> halaman ini belum dipilihkan templatenya.
        Buka halaman ini di admin, lalu di panel kanan pilih <b>Template</b> yang sesuai
        (misalnya &ldquo;Halaman: Tentang Kami&rdquo;). Kotak ini hanya terlihat oleh Anda yang sudah login.
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
