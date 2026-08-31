<?php
/*
Template Name: Halaman: Kontak
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; Kontak</div>
    <h1><?php tcm_kaya( 'kontak', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'kontak', 'kepala_teks' ); ?></p>
  </div>
</section>
<div class="wrap">
  <div class="kwrap">
    <div class="kcard rv">
      <h3 style="font-size:20px;margin-bottom:24px"><?php tcm_teks( 'kontak', 'kartu_judul' ); ?></h3>
        <div class="krow" style="--c:var(--navy)">
          <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-pin"/></svg></div>
          <div><b><?php tcm_teks( 'kontak', 'baris_alamat' ); ?></b><span><?php tcm_kaya( 'kontak', 'kantor_alamat' ); ?></span></div>
        </div>
        <div class="krow" style="--c:var(--green)">
          <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-phone"/></svg></div>
          <div><b><?php tcm_teks( 'kontak', 'baris_telepon' ); ?></b><span><?php tcm_teks( 'kontak', 'kantor_telepon' ); ?></span></div>
        </div>
        <div class="krow" style="--c:var(--orange)">
          <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-mail"/></svg></div>
          <div><b><?php tcm_teks( 'kontak', 'baris_email' ); ?></b><span><a href="mailto:<?php echo esc_attr( tcm_kwt_nilai( 'kontak', 'kantor_email' ) ); ?>"><?php tcm_teks( 'kontak', 'kantor_email' ); ?></a></span></div>
        </div>
        <div class="krow" style="--c:var(--navy)">
          <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-clock"/></svg></div>
          <div><b><?php tcm_teks( 'kontak', 'baris_jam' ); ?></b><span><?php tcm_teks( 'kontak', 'kantor_jam' ); ?></span></div>
        </div>
      <a class="maplink" href="<?php echo esc_url( tcm_kwt_nilai( 'kontak', 'peta_url' ) ); ?>" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" style="width:16px;height:16px;fill:none;stroke:currentColor;stroke-width:2"><use href="#i-pin"/></svg> <?php tcm_teks( 'kontak', 'peta_tombol' ); ?> &rarr;</a>
    </div>
<?php $tcm_form = tcm_form_sumber(); ?>
<?php if ( 'plugin' === $tcm_form['mode'] ) : ?>
    <div class="form rv">
      <h3><?php tcm_teks( 'kontak', 'form_judul' ); ?></h3>
      <p class="sub"><?php tcm_teks( 'kontak', 'form_sub' ); ?></p>
      <?php echo do_shortcode( $tcm_form['shortcode'] ); ?>
    </div>
<?php else : ?>
    <form class="form rv" id="kf">
      <h3><?php tcm_teks( 'kontak', 'form_judul' ); ?></h3>
      <p class="sub"><?php tcm_teks( 'kontak', 'form_sub' ); ?></p>
      <div class="two-col">
        <div class="fld"><label for="nama"><?php tcm_teks( 'kontak', 'f_nama' ); ?></label><input id="nama" name="nama" type="text" required></div>
        <div class="fld"><label for="pt"><?php tcm_teks( 'kontak', 'f_pt' ); ?></label><input id="pt" name="pt" type="text" required></div>
      </div>
      <div class="two-col">
        <div class="fld"><label for="email"><?php tcm_teks( 'kontak', 'f_email' ); ?></label><input id="email" name="email" type="email" required></div>
        <div class="fld"><label for="telp"><?php tcm_teks( 'kontak', 'f_telp' ); ?></label><input id="telp" name="telp" type="tel"></div>
      </div>
      <div class="fld"><label for="hal"><?php tcm_teks( 'kontak', 'f_hal' ); ?></label><select id="hal" name="hal">
<?php
foreach ( preg_split( '/\r\n|\r|\n/', (string) tcm_kwt_nilai( 'kontak', 'f_pilihan' ) ) as $tcm_opsi ) :
  $tcm_opsi = trim( $tcm_opsi );
  if ( '' === $tcm_opsi ) { continue; }
?>
        <option><?php echo esc_html( $tcm_opsi ); ?></option>
<?php endforeach; ?>
      </select></div>
      <div class="fld"><label for="pesan"><?php tcm_teks( 'kontak', 'f_pesan' ); ?></label><textarea id="pesan" name="pesan" required></textarea></div>
      <button class="btn btn-p" type="submit"><?php tcm_teks( 'kontak', 'f_tombol' ); ?> &rarr;</button>
      <div class="formnote" id="note"><?php tcm_teks( 'kontak', 'form_catatan' ); ?></div>
<?php if ( $tcm_form['masalah'] && current_user_can( 'edit_pages' ) ) : ?>
      <div class="formnote"><b>Catatan untuk pengelola:</b> <?php echo esc_html( $tcm_form['masalah'] ); ?>
        Formulir bawaan tema dipakai untuk sementara. <i>(Pesan ini hanya terlihat oleh pengelola situs.)</i></div>
<?php endif; ?>
    </form>
<?php endif; ?>
  </div>
</div>
<section>
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'kontak', 'lok_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'kontak', 'lok_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'kontak', 'lok_lede' ); ?></p>
    </div>
    <div class="offs">
      <div class="off rv" style="--c:var(--navy)">
        <b><?php tcm_teks( 'kontak', 'off1_label' ); ?></b><h4><?php tcm_teks( 'kontak', 'off1_judul' ); ?></h4><p><?php tcm_teks( 'kontak', 'off1_teks' ); ?></p>
      </div>
      <div class="off rv" style="--c:var(--green)">
        <b><?php tcm_teks( 'kontak', 'off2_label' ); ?></b><h4><?php tcm_teks( 'kontak', 'off2_judul' ); ?></h4><p><?php tcm_teks( 'kontak', 'off2_teks' ); ?></p>
      </div>
      <div class="off rv" style="--c:var(--orange)">
        <b><?php tcm_teks( 'kontak', 'off3_label' ); ?></b><h4><?php tcm_teks( 'kontak', 'off3_judul' ); ?></h4><p><?php tcm_teks( 'kontak', 'off3_teks' ); ?></p>
      </div>
    </div>
    <div style="margin-top:38px">
      <a class="btn btn-o" href="<?php echo esc_url( home_url('/') ); ?>#jangkauan"><?php tcm_teks( 'kontak', 'jangkauan_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</section>
<section style="background:var(--paper)">
  <div class="wrap">
    <div class="cta-band rv">
      <div><h2><?php tcm_teks( 'kontak', 'cta_judul' ); ?></h2>
        <p><?php tcm_teks( 'kontak', 'cta_teks' ); ?></p></div>
      <a class="btn btn-p" href="<?php echo esc_url( tcm_url( array('karier','karir'), '/karier/' ) ); ?>" style="justify-self:end"><?php tcm_teks( 'kontak', 'cta_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</section>

<script>
(function(){
  var f=document.getElementById('kf');
  if(!f) return;
  f.addEventListener('submit',function(e){
    e.preventDefault();
    var n=document.getElementById('note');
    n.textContent='Ini masih prototype — formulir belum terhubung ke email perusahaan. '
      + 'Untuk sementara silakan kirim langsung ke tcm@trimitraciptamandiri.com.';
    n.scrollIntoView({behavior:'smooth',block:'center'});
  });
})();
</script>
<?php get_footer(); ?>
