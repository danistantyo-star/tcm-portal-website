<?php
/*
Template Name: Halaman: ESG
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; ESG</div>
    <h1><?php tcm_kaya( 'esg', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'esg', 'kepala_teks' ); ?></p>
  </div>
</section>
<div class="wrap">
  <div class="esgw">
    <div class="esg rv" style="--c:var(--green)">
      <div class="top"><div class="ltr">E</div>
        <h2><?php tcm_teks( 'esg', 'e_nama' ); ?><span><?php tcm_teks( 'esg', 'e_nama_en' ); ?></span></h2></div>
      <div class="bd">
        <p class="lede"><?php tcm_teks( 'esg', 'e_lede' ); ?></p>
        <div class="eitems">
<?php
foreach ( preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'esg', 'e_butir' ) ) as $tcm_b ) :
  $tcm_b = trim( $tcm_b );
  if ( '' === $tcm_b ) { continue; }
  $tcm_bagi = array_map( 'trim', explode( '|', $tcm_b, 2 ) );
?>
          <div class="eitem"><b><?php echo esc_html( $tcm_bagi[0] ); ?></b><?php if ( isset( $tcm_bagi[1] ) && '' !== $tcm_bagi[1] ) : ?><span><?php echo esc_html( $tcm_bagi[1] ); ?></span><?php endif; ?></div>
<?php endforeach; ?>
        </div><div class="eyebrow" style="margin:26px 0 0;font-size:11px"><?php tcm_teks( 'esg', 'dok_label' ); ?></div><div class="edok two"><figure><img src="<?php tcm_gambar( 'esg', 'foto_e1', 'assets/img/penanaman-pohon-di-wilayah-operasi.jpg' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'esg', 'foto_cap1' ) ); ?>" loading="lazy"><figcaption><?php tcm_teks( 'esg', 'foto_cap1' ); ?></figcaption></figure><figure><img src="<?php tcm_gambar( 'esg', 'foto_e2', 'assets/img/penanaman-bibit-pohon-oleh-personel-tcm.jpg' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'esg', 'foto_cap2' ) ); ?>" loading="lazy"><figcaption><?php tcm_teks( 'esg', 'foto_cap2' ); ?></figcaption></figure></div>
      </div>
    </div>
    <div class="esg rv" style="--c:var(--navy)">
      <div class="top"><div class="ltr">S</div>
        <h2><?php tcm_teks( 'esg', 's_nama' ); ?><span><?php tcm_teks( 'esg', 's_nama_en' ); ?></span></h2></div>
      <div class="bd">
        <p class="lede"><?php tcm_teks( 'esg', 's_lede' ); ?></p>
        <div class="eitems">
<?php
foreach ( preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'esg', 's_butir' ) ) as $tcm_b ) :
  $tcm_b = trim( $tcm_b );
  if ( '' === $tcm_b ) { continue; }
  $tcm_bagi = array_map( 'trim', explode( '|', $tcm_b, 2 ) );
?>
          <div class="eitem"><b><?php echo esc_html( $tcm_bagi[0] ); ?></b><?php if ( isset( $tcm_bagi[1] ) && '' !== $tcm_bagi[1] ) : ?><span><?php echo esc_html( $tcm_bagi[1] ); ?></span><?php endif; ?></div>
<?php endforeach; ?>
        </div><div class="eyebrow" style="margin:26px 0 0;font-size:11px"><?php tcm_teks( 'esg', 'dok_label' ); ?></div><div class="edok"><figure><img src="<?php tcm_gambar( 'esg', 'foto_s1', 'assets/img/bantuan-kemanusiaan-korban-banjir-tanah-longsor-.jpg' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'esg', 'foto_cap3' ) ); ?>" loading="lazy"><figcaption><?php tcm_teks( 'esg', 'foto_cap3' ); ?></figcaption></figure><figure><img src="<?php tcm_gambar( 'esg', 'foto_s2', 'assets/img/penyaluran-logistik-bantuan-bencana.jpg' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'esg', 'foto_cap4' ) ); ?>" loading="lazy"><figcaption><?php tcm_teks( 'esg', 'foto_cap4' ); ?></figcaption></figure><figure><img src="<?php tcm_gambar( 'esg', 'foto_s3', 'assets/img/penyerahan-bantuan-di-posko-bencana.jpg' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'esg', 'foto_cap5' ) ); ?>" loading="lazy"><figcaption><?php tcm_teks( 'esg', 'foto_cap5' ); ?></figcaption></figure></div>
      </div>
    </div>
    <div class="esg rv" style="--c:var(--orange)">
      <div class="top"><div class="ltr">G</div>
        <h2><?php tcm_teks( 'esg', 'g_nama' ); ?><span><?php tcm_teks( 'esg', 'g_nama_en' ); ?></span></h2></div>
      <div class="bd">
        <p class="lede"><?php tcm_teks( 'esg', 'g_lede' ); ?></p>
        <div class="eitems">
<?php
foreach ( preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'esg', 'g_butir' ) ) as $tcm_b ) :
  $tcm_b = trim( $tcm_b );
  if ( '' === $tcm_b ) { continue; }
  $tcm_bagi = array_map( 'trim', explode( '|', $tcm_b, 2 ) );
?>
          <div class="eitem"><b><?php echo esc_html( $tcm_bagi[0] ); ?></b><?php if ( isset( $tcm_bagi[1] ) && '' !== $tcm_bagi[1] ) : ?><span><?php echo esc_html( $tcm_bagi[1] ); ?></span><?php endif; ?></div>
<?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="esgnote rv">
    <?php tcm_kaya( 'esg', 'catatan_awal' ); ?> <a href="<?php echo esc_url( tcm_url( array('sertifikat','sertifikat-penghargaan'), '/sertifikat/' ) ); ?>"><b><?php tcm_teks( 'esg', 'catatan_tautan' ); ?></b></a>. <?php tcm_kaya( 'esg', 'catatan_akhir' ); ?>
  </div>
  <div style="margin:36px 0 10px;text-align:center">
    <a class="btn btn-o" href="<?php echo esc_url( tcm_url( array('sertifikat','sertifikat-penghargaan'), '/sertifikat/' ) ); ?>"><?php tcm_teks( 'esg', 'tombol' ); ?> &rarr;</a>
  </div>
</div>

<div class="lb" id="lb"><button class="x" aria-label="Tutup">&times;</button><img id="lbi" alt=""><div class="cap" id="lbc"></div></div>

<?php get_footer(); ?>
