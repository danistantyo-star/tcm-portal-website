<?php
/** Satu berita. */
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp;
      <a href="<?php echo esc_url( home_url('/berita/') ); ?>">Berita</a></div>
    <h1><?php the_title(); ?></h1>
    <p><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></p>
  </div>
</section>

<section>
  <div class="wrap" style="max-width:820px">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php if ( has_post_thumbnail() ) : ?>
        <figure class="berita-utama"><?php the_post_thumbnail( 'large' ); ?></figure>
      <?php endif; ?>
      <div class="tcm-isi"><?php the_content(); ?></div>
    <?php endwhile; ?>
    <div style="margin-top:44px">
      <a class="btn btn-o" href="<?php echo esc_url( home_url('/berita/') ); ?>"><?php tcm_teks( 'berita', 'tombol_kembali' ); ?></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
