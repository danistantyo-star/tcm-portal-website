<?php
/*
Template Name: Halaman: Proyek
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; Proyek</div>
    <h1><?php tcm_kaya( 'proyek', 'kepala_judul' ); ?></h1>
    <p><?php echo esc_html( tcm_terbilang( tcm_jumlah_proyek() ) ); ?> <?php tcm_teks( 'proyek', 'kepala_teks' ); ?></p>
  </div>
</section>
<div class="wrap">
  <div class="pnum rv">
    <div style="--c:var(--navy)"><b><?php echo (int) tcm_jumlah_proyek(); ?></b><span><?php tcm_teks( 'proyek', 'num1_label' ); ?></span></div>
    <div style="--c:var(--green)"><b><?php echo (int) tcm_jumlah_proyek( 'berjalan' ); ?></b><span><?php tcm_teks( 'proyek', 'num2_label' ); ?></span></div>
    <div style="--c:var(--orange)"><b><?php tcm_teks( 'proyek', 'num3_nilai' ); ?></b><span><?php tcm_teks( 'proyek', 'num3_label' ); ?></span></div>
    <div style="--c:var(--navy-l)"><b><?php tcm_teks( 'proyek', 'num4_nilai' ); ?></b><span><?php tcm_teks( 'proyek', 'num4_label' ); ?></span></div>
  </div>
</div>
<section>
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'proyek', 'ung_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'proyek', 'ung_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'proyek', 'ung_lede' ); ?></p>
    </div>
    <div class="feat">
<?php
$tcm_ung = array(
  array( 'ung1', 'foto_unggul1', 'assets/img/star-energy-geothermal-salak.jpg', 'green' ),
  array( 'ung2', 'foto_unggul2', 'assets/img/drilling-preparation-well-hook-up-construction.jpg', 'orange' ),
  array( 'ung3', 'foto_unggul3', 'assets/img/area-rokan-riau.jpg', 'navy' ),
);
foreach ( $tcm_ung as $u ) :
  list( $k, $kunci_foto, $foto_bawaan, $warna ) = $u;
  $judul = trim( (string) tcm_kwt_nilai( 'proyek', $k . '_judul' ) );
  if ( '' === $judul ) { continue; }
  $lingkup = preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'proyek', $k . '_lingkup' ) );
  $lingkup = array_values( array_filter( array_map( 'trim', $lingkup ), 'strlen' ) );
?>
      <article class="fcard rv" style="--c:var(--<?php echo esc_attr( $warna ); ?>)">
        <div class="fp"><img src="<?php tcm_gambar( 'proyek', $kunci_foto, $foto_bawaan ); ?>" alt="<?php echo esc_attr( $judul ); ?>"><span class="chip"><?php tcm_teks( 'proyek', $k . '_chip' ); ?></span></div>
        <div class="fb">
          <h3><?php echo esc_html( $judul ); ?></h3>
          <div class="who"><?php tcm_teks( 'proyek', $k . '_klien' ); ?></div>
          <p><?php tcm_teks( 'proyek', $k . '_teks' ); ?></p>
          <ul class="scope"><?php foreach ( $lingkup as $baris ) : ?><li><?php echo esc_html( $baris ); ?></li><?php endforeach; ?></ul>
          <div class="fmeta"><span><?php tcm_teks( 'proyek', 'meta_lokasi' ); ?>: <b><?php tcm_teks( 'proyek', $k . '_lokasi' ); ?></b></span><span><?php tcm_teks( 'proyek', 'meta_periode' ); ?>: <b><?php tcm_teks( 'proyek', $k . '_periode' ); ?></b></span><span><?php tcm_teks( 'proyek', 'meta_status' ); ?>: <b><?php tcm_teks( 'proyek', $k . '_status' ); ?></b></span></div>
        </div>
      </article>
<?php endforeach; ?>
    </div>

  </div>
</section>
<section>
  <div class="wrap">
    <?php $GLOBALS['tcm_jambi_ringkas'] = false; get_template_part( 'bagian/jambi' ); ?>
  </div>
</section>
<section style="background:var(--paper)" id="daftar">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'proyek', 'daftar_eyebrow' ); ?></div>
      <h2 class="sec"><?php echo esc_html( tcm_terbilang( tcm_jumlah_proyek() ) ); ?> <em>Proyek</em></h2>
      <p class="lede"><?php tcm_teks( 'proyek', 'daftar_lede' ); ?></p>
      <div class="filters">
        <button class="filt on" data-f="all">Semua</button>
        <button class="filt" data-f="geo">Panas Bumi</button>
        <button class="filt" data-f="og">Minyak &amp; Gas</button>
        <button class="filt" data-f="con">Konstruksi &amp; Sipil</button>
      </div>
    </div>
    <div class="plist2">
<?php
$q = new WP_Query( array(
    'post_type'      => 'tcm_proyek',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );
if ( $q->have_posts() ) : $i = 0;
  while ( $q->have_posts() ) : $q->the_post(); $i++;
    $m = tcm_meta( get_the_ID(), array('klien','lokasi','periode','status','kategori','warna','lingkup','tag') );
    $warna = $m['warna'] ? $m['warna'] : 'navy';
?>
      <details class="prow rv" data-c="<?php echo esc_attr( $m['kategori'] ); ?>" style="--c:var(--<?php echo esc_attr( $warna ); ?>)">
        <summary>
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="th"><?php the_post_thumbnail( 'tcm-thumb', array('alt'=>'') ); ?></div>
          <?php else : ?>
            <div class="th ni"><?php echo esc_html( sprintf('%02d', $i) ); ?></div>
          <?php endif; ?>
          <div>
            <h4><?php the_title(); ?></h4>
            <div class="pmeta">
              <span>Klien: <b><?php echo esc_html( $m['klien'] ); ?></b></span>
              <span>Lokasi: <b><?php echo esc_html( $m['lokasi'] ); ?></b></span>
              <span>Periode: <b><?php echo esc_html( $m['periode'] ); ?></b></span>
            </div>
          </div>
          <div class="rt">
            <?php if ( 'selesai' === $m['status'] ) : ?>
              <span class="stat-chip st-done"><?php tcm_teks( 'umum', 'chip_selesai' ); ?></span>
            <?php else : ?>
              <span class="stat-chip st-run"><?php tcm_teks( 'umum', 'chip_berjalan' ); ?></span>
            <?php endif; ?>
            <span class="caret">&#9660;</span>
          </div>
        </summary>
        <div class="det">
          <h5>Lingkup Pekerjaan</h5>
          <p><?php echo wp_kses_post( wpautop( $m['lingkup'] ) ); ?></p>
          <?php echo tcm_tags( $m['tag'] ); ?>
        </div>
      </details>
<?php
  endwhile; wp_reset_postdata();
else :
?>
      <p class="lede">Belum ada proyek yang ditambahkan. Buka <b>Proyek &rarr; Tambah Baru</b> di menu admin.</p>
<?php endif; ?>
    </div>

  </div>
</section>
<section id="dokumentasi">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'proyek', 'dok_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'proyek', 'dok_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'proyek', 'dok_lede' ); ?></p>
    </div>
    <div class="pgal">
<?php
$tcm_galeri = array(
  array( 'foto_galeri9',  'assets/img/armada-krp-area-rokan.jpg',                          'gal_cap9'  ),
  array( 'foto_galeri10', 'assets/img/koordinasi-tim-area-rokan.jpg',                      'gal_cap10' ),
  array( 'foto_galeri1',  'assets/img/drilling-preparation-well-hook-up-construction.jpg', 'gal_cap1'  ),
  array( 'foto_galeri2',  'assets/img/shut-down-turn-around-welding.jpg',                   'gal_cap2'  ),
  array( 'foto_galeri3',  'assets/img/penggantian-aft-jalur-kondensat.jpg',                 'gal_cap3'  ),
  array( 'foto_galeri4',  'assets/img/pembersihan-heat-exchanger-orc.jpg',                  'gal_cap4'  ),
  array( 'foto_galeri5',  'assets/img/fabrikasi-instalasi-rock-muffler.jpg',                'gal_cap5'  ),
  array( 'foto_galeri6',  'assets/img/perbaikan-dan-pemeliharaan-jalan.jpg',                'gal_cap6'  ),
  array( 'foto_galeri7',  'assets/img/tim-welding-di-area-operasi.jpg',                     'gal_cap7'  ),
  array( 'foto_galeri8',  'assets/img/pemeliharaan-valve-perpipaan.jpg',                    'gal_cap8'  ),
);
foreach ( $tcm_galeri as $f ) :
  $kapsi = tcm_kwt_nilai( 'proyek', $f[2] );
  if ( '' === trim( $kapsi ) ) { continue; }
?>
      <figure class="cthumb rv" data-zoom data-cap="<?php echo esc_attr( $kapsi ); ?>"><img src="<?php tcm_gambar( 'proyek', $f[0], $f[1] ); ?>" alt="<?php echo esc_attr( $kapsi ); ?>" loading="lazy"><figcaption><?php echo esc_html( $kapsi ); ?></figcaption></figure>
<?php endforeach; ?>
    </div>
  </div>
</section>
<section style="background:var(--paper)">
  <div class="wrap">
    <div class="rv" style="text-align:center">
      <div class="eyebrow"><?php tcm_teks( 'proyek', 'klien_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'proyek', 'klien_judul' ); ?></h2>
    </div>
    <div class="lstrip rv">
      <img src="<?php tcm_gambar( 'proyek', 'logo_klien1', 'assets/img/star-energy-geothermal.png' ); ?>" alt="" loading="lazy">
      <img src="<?php tcm_gambar( 'proyek', 'logo_klien2', 'assets/img/triguna-internusa-pratama.png' ); ?>" alt="" loading="lazy">
      <img src="<?php tcm_gambar( 'proyek', 'logo_klien3', 'assets/img/pt-pln-persero.png' ); ?>" alt="" loading="lazy">
      <img src="<?php tcm_gambar( 'proyek', 'logo_klien4', 'assets/img/pln-indonesia-power.png' ); ?>" alt="" loading="lazy">
      <img src="<?php tcm_gambar( 'proyek', 'logo_klien5', 'assets/img/pt-energasindo-heksa-karya.png' ); ?>" alt="" loading="lazy">
      <img src="<?php tcm_gambar( 'proyek', 'logo_klien6', 'assets/img/pt-pertamina-gas.png' ); ?>" alt="" loading="lazy">
      <img src="<?php tcm_gambar( 'proyek', 'logo_klien7', 'assets/img/pt-transportasi-gas-indonesia.png' ); ?>" alt="" loading="lazy">
      <img src="<?php tcm_gambar( 'proyek', 'logo_klien8', 'assets/img/pt-trakindo-utama.png' ); ?>" alt="" loading="lazy">
    </div>
    <div style="margin-top:38px;text-align:center">
      <a class="btn btn-o" href="<?php echo esc_url( home_url('/') ); ?>#klien">Lihat Semua Klien &amp; Mitra &rarr;</a>
    </div>
  </div>
</section>
<section>
  <div class="wrap">
    <div class="cta-band rv">
      <div><h2><?php tcm_teks( 'proyek', 'cta_judul' ); ?></h2>
        <p><?php tcm_teks( 'proyek', 'cta_teks' ); ?></p></div>
      <a class="btn btn-p" href="<?php echo esc_url( tcm_url( array('kontak','hubungi-kami'), '/kontak/' ) ); ?>" style="justify-self:end">Hubungi Kami &rarr;</a>
    </div>
  </div>
</section>
<div class="lb" id="lb"><button class="x" aria-label="Tutup">&times;</button><img id="lbi" alt=""><div class="cap" id="lbc"></div></div>

<script>
(function(){
  // penyaring untuk daftar akordeon
  var fb=document.querySelectorAll('.filt'), rows=document.querySelectorAll('.prow');
  fb.forEach(function(b){ b.addEventListener('click',function(){
    var f=b.dataset.f;
    rows.forEach(function(r){
      var show=(f==='all'||r.dataset.c===f);
      r.classList.toggle('hide',!show);
      if(!show) r.removeAttribute('open');
    });
  });});
  // hanya satu baris terbuka pada satu waktu
  rows.forEach(function(r){ r.addEventListener('toggle',function(){
    if(!r.open) return;
    rows.forEach(function(o){ if(o!==r) o.removeAttribute('open'); });
  });});
})();
</script>
<?php get_footer(); ?>
