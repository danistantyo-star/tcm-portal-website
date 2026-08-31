<?php
/*
Template Name: Halaman: Sertifikat
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; Sertifikat &amp; Penghargaan</div>
    <h1><?php tcm_kaya( 'sertifikat', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'sertifikat', 'kepala_teks' ); ?></p>
  </div>
</section>
<div class="subnav">
  <div class="wrap">
    <a href="#manajemen"><?php tcm_teks( 'sertifikat', 'nav1' ); ?></a>
    <a href="#csms"><?php tcm_teks( 'sertifikat', 'nav2' ); ?></a>
    <a href="#penghargaan"><?php tcm_teks( 'sertifikat', 'nav3' ); ?></a>
    <a href="#legalitas"><?php tcm_teks( 'sertifikat', 'nav4' ); ?></a>
  </div>
</div>
<div class="wrap">
  <div class="snum rv">
    <div style="--c:var(--navy)"><b><?php echo (int) tcm_jumlah_sertifikat( 'iso' ); ?></b><span><?php tcm_teks( 'sertifikat', 'num1_label' ); ?></span></div>
    <div style="--c:var(--green)"><b><?php echo (int) tcm_jumlah_sertifikat( 'csms' ); ?></b><span><?php tcm_teks( 'sertifikat', 'num2_label' ); ?></span></div>
    <div style="--c:var(--orange)"><b><?php echo (int) tcm_jumlah_sertifikat( 'penghargaan' ); ?></b><span><?php tcm_teks( 'sertifikat', 'num3_label' ); ?></span></div>
    <div style="--c:var(--navy-l)"><b>493.177</b><span><?php tcm_teks( 'sertifikat', 'num4_label' ); ?></span></div>
  </div>
</div>
<section id="manajemen">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'sertifikat', 'iso_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'sertifikat', 'iso_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'sertifikat', 'iso_lede' ); ?></p>
    </div>
    <div class="dgrid">
<?php
$q = tcm_sertifikat_query( 'iso' );
if ( $q->have_posts() ) :
  while ( $q->have_posts() ) : $q->the_post();
    echo tcm_kartu_dokumen( get_the_ID(), 'i-target' );
  endwhile; wp_reset_postdata();
else :
  echo '<p class="lede">Belum ada dokumen pada kelompok ini.</p>';
endif;
?>
    </div>
    </div>
  </div>
</section>
<section id="csms" style="background:var(--paper)">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'sertifikat', 'csms_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'sertifikat', 'csms_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'sertifikat', 'csms_lede' ); ?></p>
    </div>
    <div class="dgrid">
<?php
$q = tcm_sertifikat_query( 'csms' );
if ( $q->have_posts() ) :
  while ( $q->have_posts() ) : $q->the_post();
    echo tcm_kartu_dokumen( get_the_ID(), 'i-shield' );
  endwhile; wp_reset_postdata();
else :
  echo '<p class="lede">Belum ada dokumen pada kelompok ini.</p>';
endif;
?>
    </div>
    </div>
  </div>
</section>
<section id="penghargaan">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'sertifikat', 'peng_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'sertifikat', 'peng_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'sertifikat', 'peng_lede' ); ?></p>
    </div>
<?php
$q = tcm_sertifikat_query( 'penghargaan' );
if ( $q->have_posts() ) :
  $tahun_terakhir = '';
  $terbuka = false;
  while ( $q->have_posts() ) : $q->the_post();
    $tahun = get_post_meta( get_the_ID(), 'tcm_tahun', true );
    if ( $tahun !== $tahun_terakhir ) {
        if ( $terbuka ) { echo '    </div>' . "\n"; }
        echo '    <div class="yr-band rv"><b>' . esc_html( $tahun ) . '</b><i></i></div>' . "\n";
        echo '    <div class="dgrid" style="margin-top:20px">' . "\n";
        $tahun_terakhir = $tahun;
        $terbuka = true;
    }
    echo tcm_kartu_dokumen( get_the_ID(), 'i-star' );
  endwhile;
  if ( $terbuka ) { echo '    </div>' . "\n"; }
  wp_reset_postdata();
else :
  echo '<p class="lede">Belum ada penghargaan yang ditambahkan.</p>';
endif;
?>
  </div>
</section>
<section id="legalitas" style="background:var(--paper)">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'sertifikat', 'leg_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'sertifikat', 'leg_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'sertifikat', 'leg_lede' ); ?></p>
    </div>
    <div class="ltab rv">
<?php
$q = tcm_sertifikat_query( 'legalitas' );
if ( $q->have_posts() ) :
  while ( $q->have_posts() ) : $q->the_post();
    $m = tcm_meta( get_the_ID(), array('penerbit','berlaku','warna') );
    $warna = $m['warna'] ? $m['warna'] : 'navy';
?>
      <div class="lr" style="--c:var(--<?php echo esc_attr( $warna ); ?>)">
        <div class="k"><svg viewBox="0 0 24 24"><use href="#i-check"/></svg></div>
        <div><b><?php the_title(); ?></b><div class="sub"><?php echo esc_html( $m['penerbit'] ); ?></div></div>
        <div class="v"><?php echo esc_html( $m['berlaku'] ); ?></div>
      </div>
<?php
  endwhile; wp_reset_postdata();
endif;
?>
    </div>
    </div>
    <div class="wmnote rv">
      <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-shield"/></svg></div>
      <div><h4><?php tcm_teks( 'sertifikat', 'wm_judul' ); ?></h4>
        <p><?php
          $tcm_wm = tcm_kwt_nilai( 'sertifikat', 'wm_teks' );
          $tcm_surel = tcm_kwt_nilai( 'kontak', 'kantor_email' );
          $tcm_tautan = '<a href="mailto:' . esc_attr( $tcm_surel ) . '">' . esc_html( $tcm_surel ) . '</a>';
          echo str_replace( '{email}', $tcm_tautan, esc_html( $tcm_wm ) );
        ?></p>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="wrap">
    <div class="cta-band rv">
      <div><h2><?php tcm_teks( 'sertifikat', 'cta_judul' ); ?></h2>
        <p><?php tcm_teks( 'sertifikat', 'cta_teks' ); ?></p></div>
      <a class="btn btn-p" href="<?php echo esc_url( tcm_url( array('kontak','hubungi-kami'), '/kontak/' ) ); ?>" style="justify-self:end"><?php tcm_teks( 'sertifikat', 'cta_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</section>
<div class="lb" id="lb"><button class="x" aria-label="Tutup">&times;</button><img id="lbi" alt=""><div class="cap" id="lbc"></div></div>

<script>
(function(){
  var links=[].slice.call(document.querySelectorAll('.subnav a'));
  var secs=links.map(function(a){ return document.querySelector(a.getAttribute('href')); });
  function mark(){
    var y=window.scrollY+170, cur=0;
    secs.forEach(function(s,i){ if(s && s.offsetTop<=y) cur=i; });
    links.forEach(function(a,i){ a.classList.toggle('cur', i===cur); });
  }
  mark(); window.addEventListener('scroll',mark,{passive:true});
})();
</script>
<?php get_footer(); ?>
