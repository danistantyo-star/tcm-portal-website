<?php
/*
Template Name: Halaman: SDM & Human Capital
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; SDM &amp; Human Capital</div>
    <h1><?php tcm_kaya( 'sdm', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'sdm', 'kepala_teks' ); ?></p>
  </div>
</section><style>.gph{position:relative;margin:0;border-radius:var(--r);overflow:hidden;box-shadow:var(--shadow-lg)}.gph img{width:100%;aspect-ratio:4/3;object-fit:cover;display:block;transition:.3s}.gph:hover img{transform:scale(1.04)}.gph figcaption{position:absolute;left:0;right:0;bottom:0;color:#fff;font-size:13px;font-weight:600;padding:28px 14px 12px;background:linear-gradient(transparent,rgba(0,16,40,.82))}.draftnote{margin-top:12px;display:inline-block;background:#FDEDE0;border:1px dashed var(--orange);color:#8A4300;font-size:12px;font-weight:700;padding:8px 14px;border-radius:8px}.gal{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:40px}.gtile{position:relative;border-radius:var(--r);border:1.5px dashed var(--line);background:var(--paper);aspect-ratio:4/3;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px;color:var(--mute)}.gtile b{font-size:14px;color:var(--body)}.gtile span{font-size:12px}.gtile svg{width:30px;height:30px;fill:none;stroke:currentColor;stroke-width:1.6;opacity:.55}.figw img{width:100%;border-radius:var(--r);display:block;box-shadow:var(--shadow-lg)}.gal.g4{grid-template-columns:repeat(4,1fr)}@media(max-width:860px){.gal{grid-template-columns:1fr 1fr}.gal.g4{grid-template-columns:1fr 1fr}}</style>
<section>
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'sdm', 'tim_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'sdm', 'tim_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'sdm', 'tim_lede' ); ?></p>
    </div>
    <div class="figw rv" style="margin-top:40px"><img src="<?php tcm_gambar( 'sdm', 'foto_tim', 'assets/img/tim-pt-trimitra-cipta-mandiri.jpg' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'sdm', 'tim_kapsi' ) ); ?>"></div>
    <p class="figcap"><?php tcm_teks( 'sdm', 'tim_kapsi' ); ?></p>

    <div class="rv subhead">
      <div class="eyebrow"><?php tcm_teks( 'sdm', 'site_eyebrow' ); ?></div>
      <h3><?php tcm_kaya( 'sdm', 'site_judul' ); ?></h3>
      <p><?php tcm_teks( 'sdm', 'site_teks' ); ?></p>
    </div>
    <div class="gal rv">
<?php
$tcm_site = array(
  array( 'foto_site1', 'assets/img/tim-site-tcm-nilai-pace.jpg', 'site_cap1' ),
  array( 'foto_site2', 'assets/img/kunjungan-manajemen-fasilitas-pembangkit.jpg', 'site_cap2' ),
  array( 'foto_site3', 'assets/img/paparan-operasi-bersama-tim-site.jpg', 'site_cap3' ),
);
foreach ( $tcm_site as $f ) :
  $kapsi = tcm_kwt_nilai( 'sdm', $f[2] );
?>
      <figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', $f[0], $f[1] ); ?>" alt="<?php echo esc_attr( $kapsi ); ?>" loading="lazy"><figcaption><?php echo esc_html( $kapsi ); ?></figcaption></figure>
<?php endforeach; ?>
    </div>
  </div>
</section>
<section style="background:var(--paper)">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'sdm', 'kem_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'sdm', 'kem_judul' ); ?></h2>
    </div>
    <div class="why">
      <div class="wcard rv" style="--c:var(--navy)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-target"/></svg></div>
        <h3><?php tcm_teks( 'sdm', 'kem1_judul' ); ?></h3><p><?php tcm_teks( 'sdm', 'kem1_teks' ); ?></p>
      </div>
      <div class="wcard rv" style="--c:var(--green)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-shield"/></svg></div>
        <h3><?php tcm_teks( 'sdm', 'kem2_judul' ); ?></h3><p><?php tcm_teks( 'sdm', 'kem2_teks' ); ?></p>
      </div>
      <div class="wcard rv" style="--c:var(--orange)">
        <div class="ic"><svg viewBox="0 0 24 24"><use href="#i-star"/></svg></div>
        <h3><?php tcm_teks( 'sdm', 'kem3_judul' ); ?></h3><p><?php tcm_teks( 'sdm', 'kem3_teks' ); ?></p>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'sdm', 'ai_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'sdm', 'ai_judul' ); ?></h2>
      <p class="lede"><?php tcm_kaya( 'sdm', 'ai_lede' ); ?></p>
      <span class="aibadge"><svg viewBox="0 0 24 24"><use href="#i-star"/></svg><?php tcm_teks( 'sdm', 'ai_badge' ); ?></span>
    </div>
    <div class="gal g4 rv">
<?php
$tcm_ai = array(
  array( 'foto_ai1', 'assets/img/pelatihan-ai-peserta.jpg', 'ai_cap1' ),
  array( 'foto_ai2', 'assets/img/pelatihan-ai-sesi-llm.jpg', 'ai_cap2' ),
  array( 'foto_ai3', 'assets/img/pelatihan-ai-kelas-hands-on.jpg', 'ai_cap3' ),
  array( 'foto_ai4', 'assets/img/pelatihan-ai-workflow.jpg', 'ai_cap4' ),
);
foreach ( $tcm_ai as $f ) :
  $kapsi = tcm_kwt_nilai( 'sdm', $f[2] );
?>
      <figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', $f[0], $f[1] ); ?>" alt="<?php echo esc_attr( $kapsi ); ?>" loading="lazy"><figcaption><?php echo esc_html( $kapsi ); ?></figcaption></figure>
<?php endforeach; ?>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'sdm', 'gal_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'sdm', 'gal_judul' ); ?></h2>
    </div>
    <div class="gal rv"><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri1', 'assets/img/family-gathering-tcm.jpg' ); ?>" alt="Family Gathering TCM" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap1' ); ?></figcaption></figure><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri2', 'assets/img/keakraban-keluarga-besar-tcm.jpg' ); ?>" alt="Keakraban keluarga besar TCM" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap2' ); ?></figcaption></figure><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri3', 'assets/img/panggung-acara-family-gathering.jpg' ); ?>" alt="Panggung acara Family Gathering" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap3' ); ?></figcaption></figure><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri4', 'assets/img/apel-bulan-k3-nasional.jpg' ); ?>" alt="Apel Bulan K3 Nasional" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap4' ); ?></figcaption></figure><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri5', 'assets/img/bulan-k3-nasional-bersama-manajemen.jpg' ); ?>" alt="Bulan K3 Nasional bersama manajemen" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap5' ); ?></figcaption></figure><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri6', 'assets/img/apresiasi-kegiatan-bulan-k3.jpg' ); ?>" alt="Apresiasi kegiatan Bulan K3" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap6' ); ?></figcaption></figure><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri7', 'assets/img/bantuan-kemanusiaan-bersama-bpbd-kab-sukabumi.jpg' ); ?>" alt="Bantuan kemanusiaan bersama BPBD Kab. Sukabumi" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap7' ); ?></figcaption></figure><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri8', 'assets/img/penanaman-pohon-di-wilayah-operasi.jpg' ); ?>" alt="Penanaman pohon di wilayah operasi" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap8' ); ?></figcaption></figure><figure class="gph rv"><img src="<?php tcm_gambar( 'sdm', 'foto_galeri9', 'assets/img/kebersamaan-tim-tcm.jpg' ); ?>" alt="Kebersamaan tim TCM" loading="lazy"><figcaption><?php tcm_teks( 'sdm', 'cap9' ); ?></figcaption></figure></div>
  </div>
</section>
<section style="background:var(--paper)">
  <div class="wrap">
    <div class="cta-band rv">
      <div><h2><?php tcm_teks( 'sdm', 'cta_judul' ); ?></h2>
        <p><?php tcm_teks( 'sdm', 'cta_teks' ); ?></p></div>
      <a class="btn btn-p" href="<?php echo esc_url( tcm_url( array('karier','karir'), '/karier/' ) ); ?>" style="justify-self:end">Lihat Karier &rarr;</a>
    </div>
  </div>
</section>

<div class="lb" id="lb"><button class="x" aria-label="Tutup">&times;</button><img id="lbi" alt=""><div class="cap" id="lbc"></div></div>

<?php get_footer(); ?>
