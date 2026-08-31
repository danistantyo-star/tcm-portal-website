<?php
/** Daftar berita. */
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; Berita</div>
    <h1><?php tcm_kaya( 'berita', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'berita', 'kepala_teks' ); ?></p>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="news">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="art rv">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="ph"><?php the_post_thumbnail( 'tcm-card' ); ?></div>
          <?php endif; ?>
          <div class="bd">
            <div class="meta"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></p>
          </div>
        </article>
      <?php endwhile; else : ?>
<?php if ( current_user_can( 'edit_posts' ) ) : ?>
        <p class="lede">Belum ada berita. Buka <b>Berita &rarr; Tambah Baru</b> di menu admin.
          <i>(Pesan ini hanya terlihat oleh pengelola situs.)</i></p>
<?php else : ?>
        <p class="lede"><?php tcm_teks( 'berita', 'kosong_teks' ); ?></p>
<?php endif; ?>
      <?php endif; ?>
    </div>
    <div style="margin-top:40px"><?php the_posts_pagination(); ?></div>
  </div>
</section>

<?php get_footer(); ?>
