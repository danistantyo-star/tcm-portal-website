<?php
/*
Template Name: Halaman: Tentang Kami
*/
get_header(); ?>

<section class="phead">
  <div class="wrap">
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php tcm_teks( 'umum', 'remah_beranda' ); ?></a> &nbsp;/&nbsp; Tentang Kami</div>
    <h1><?php tcm_kaya( 'tentang', 'kepala_judul' ); ?></h1>
    <p><?php tcm_teks( 'tentang', 'kepala_teks' ); ?></p>
  </div>
</section>
<section id="manajemen">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'tentang', 'man_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'tentang', 'man_judul' ); ?></h2>
    </div>
    <div class="dir" style="margin-top:44px">
      <div class="dirphoto rv">
        <img src="<?php tcm_gambar( 'tentang', 'foto_komisaris', 'assets/img/rony-hartanto-komisaris-pt-trimitra-cipta-mandir.jpg' ); ?>" alt="Rony Hartanto, Komisaris PT Trimitra Cipta Mandiri">
        <div class="plate"><b><?php tcm_teks( 'tentang', 'pim1_nama' ); ?></b><span><?php tcm_teks( 'tentang', 'pim1_jabatan' ); ?></span></div>
      </div>
      <div class="rv bio">
        <h3><?php tcm_teks( 'tentang', 'kom_nama' ); ?></h3><div class="jab"><?php tcm_teks( 'tentang', 'kom_jabatan' ); ?></div>
        <?php tcm_html( 'tentang', 'kom_bio' ); ?>
        <p><?php tcm_teks( 'tentang', 'pim1_bio2' ); ?></p>
        <p><?php tcm_teks( 'tentang', 'pim1_bio3' ); ?></p>
      </div>
    </div>
    <div class="dir">
      <div class="dirphoto rv">
        <img src="<?php tcm_gambar( 'tentang', 'foto_direktur', 'assets/img/fattah-hermana-direktur-pt-trimitra-cipta-mandir.jpg' ); ?>" alt="Fattah Hermana, Direktur PT Trimitra Cipta Mandiri">
        <div class="plate"><b><?php tcm_teks( 'tentang', 'pim2_nama' ); ?></b><span><?php tcm_teks( 'tentang', 'pim2_jabatan' ); ?></span></div>
      </div>
      <div class="rv bio">
        <h3><?php tcm_teks( 'tentang', 'dir_nama' ); ?></h3><div class="jab"><?php tcm_teks( 'tentang', 'dir_jabatan' ); ?></div>
        <?php tcm_html( 'tentang', 'dir_bio' ); ?>
        <p><?php tcm_teks( 'tentang', 'pim2_bio2' ); ?></p>
        <p><?php tcm_teks( 'tentang', 'pim2_bio3' ); ?></p>
      </div>
    </div>
  </div>
</section>
<section style="background:var(--paper)">
  <div class="wrap two">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'tentang', 'sekilas_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'tentang', 'sekilas_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'tentang', 'sekilas_p1' ); ?></p>
      <p class="lede" style="margin-top:14px"><?php tcm_teks( 'tentang', 'sekilas_p2' ); ?></p>
      <div class="pillars">
        <div class="pillar"><div class="ic" style="background:var(--navy)"><svg viewBox="0 0 24 24"><use href="#i-check"/></svg></div>
          <div><h4><?php tcm_teks( 'tentang', 'pil1_judul' ); ?></h4><p><?php tcm_teks( 'tentang', 'pil1_teks' ); ?></p></div></div>
        <div class="pillar"><div class="ic" style="background:var(--green)"><svg viewBox="0 0 24 24"><use href="#i-users"/></svg></div>
          <div><h4><?php tcm_teks( 'tentang', 'pil2_judul' ); ?></h4><p><?php tcm_teks( 'tentang', 'pil2_teks' ); ?></p></div></div>
        <div class="pillar"><div class="ic" style="background:var(--orange)"><svg viewBox="0 0 24 24"><use href="#i-shield"/></svg></div>
          <div><h4><?php tcm_teks( 'tentang', 'pil3_judul' ); ?></h4><p><?php tcm_teks( 'tentang', 'pil3_teks' ); ?></p></div></div>
      </div>
    </div>
    <div class="about-media rv">
      <img src="<?php tcm_gambar( 'tentang', 'foto_sekilas', 'assets/img/tim-tcm-di-area-operasi.jpg' ); ?>" alt="Fasilitas operasi PT Trimitra Cipta Mandiri">
      <div class="tag"><b><?php tcm_teks( 'tentang', 'sekilas_tag_judul' ); ?></b><span><?php tcm_teks( 'tentang', 'sekilas_tag_teks' ); ?></span></div>
    </div>
  </div>
</section>
<section id="perjalanan">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'tentang', 'jalan_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'tentang', 'jalan_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'tentang', 'jalan_lede' ); ?></p>
    </div>
    <div class="tl">
      <div class="tlrow rv" style="--c:var(--navy)">
        <div class="yr"><?php tcm_teks( 'tentang', 'tl1_tahun' ); ?></div>
        <h4><?php tcm_teks( 'tentang', 'tl1_judul' ); ?></h4>
        <p><?php tcm_teks( 'tentang', 'tl1_teks' ); ?></p>
      </div>
      <div class="tlrow rv" style="--c:var(--green)">
        <div class="yr"><?php tcm_teks( 'tentang', 'tl2_tahun' ); ?></div>
        <h4><?php tcm_teks( 'tentang', 'tl2_judul' ); ?></h4>
        <p><?php tcm_teks( 'tentang', 'tl2_teks' ); ?></p>
      </div>
      <div class="tlrow rv" style="--c:var(--orange)">
        <div class="yr"><?php tcm_teks( 'tentang', 'tl3_tahun' ); ?></div>
        <h4><?php tcm_teks( 'tentang', 'tl3_judul' ); ?></h4>
        <p><?php tcm_teks( 'tentang', 'tl3_teks' ); ?></p>
      </div>
      <div class="tlrow rv" style="--c:var(--navy)">
        <div class="yr"><?php tcm_teks( 'tentang', 'tl4_tahun' ); ?></div>
        <h4><?php tcm_teks( 'tentang', 'tl4_judul' ); ?></h4>
        <p><?php tcm_teks( 'tentang', 'tl4_teks' ); ?></p>
      </div>
      <div class="tlrow rv" style="--c:var(--green)">
        <div class="yr"><?php tcm_teks( 'tentang', 'tl5_tahun' ); ?></div>
        <h4><?php tcm_teks( 'tentang', 'tl5_judul' ); ?></h4>
        <p><?php tcm_teks( 'tentang', 'tl5_teks' ); ?></p>
      </div>
      <div class="tlrow rv" style="--c:var(--orange)">
        <div class="yr"><?php tcm_teks( 'tentang', 'tl6_tahun' ); ?></div>
        <h4><?php tcm_teks( 'tentang', 'tl6_judul' ); ?></h4>
        <p><?php tcm_teks( 'tentang', 'tl6_teks' ); ?></p>
      </div>
    </div>
  </div>
</section>
<section id="visi" style="background:var(--paper)">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'tentang', 'vm_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'tentang', 'vm_judul' ); ?></h2>
    </div>
    <div class="vm">
      <div class="vmcard v rv"><div class="ic"><svg viewBox="0 0 24 24"><use href="#i-globe"/></svg></div>
        <h3>VISI</h3>
        <p><?php tcm_teks( 'tentang', 'visi_teks' ); ?></p></div>
      <div class="vmcard m rv"><div class="ic"><svg viewBox="0 0 24 24"><use href="#i-gear"/></svg></div>
        <h3>MISI</h3>
        <ul>
          <li><?php tcm_teks( 'tentang', 'misi1' ); ?></li>
          <li><?php tcm_teks( 'tentang', 'misi2' ); ?></li>
          <li><?php tcm_teks( 'tentang', 'misi3' ); ?></li>
        </ul></div>
    </div>
  </div>
</section>
<section id="nilai">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'tentang', 'pace_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'tentang', 'pace_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'tentang', 'pace_lede' ); ?></p>
    </div>
    <div class="vals">
      <div class="val3 rv" style="--c:#FF9933">
        <div class="ic" style="background:transparent"><img src="<?php tcm_gambar( 'tentang', 'pace1_logo', 'assets/img/pace-huruf-p.png' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'tentang', 'pace1_nama' ) ); ?>" style="height:54px;width:auto"></div>
        <h3><?php tcm_teks( 'tentang', 'pace1_nama' ); ?></h3><div class="en"><?php tcm_teks( 'tentang', 'pace1_sub' ); ?></div><p><?php tcm_teks( 'tentang', 'pace1_teks' ); ?></p>
      </div>
      <div class="val3 rv" style="--c:#109D59">
        <div class="ic" style="background:transparent"><img src="<?php tcm_gambar( 'tentang', 'pace2_logo', 'assets/img/pace-huruf-a.png' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'tentang', 'pace2_nama' ) ); ?>" style="height:54px;width:auto"></div>
        <h3><?php tcm_teks( 'tentang', 'pace2_nama' ); ?></h3><div class="en"><?php tcm_teks( 'tentang', 'pace2_sub' ); ?></div><p><?php tcm_teks( 'tentang', 'pace2_teks' ); ?></p>
      </div>
      <div class="val3 rv" style="--c:#F26522">
        <div class="ic" style="background:transparent"><img src="<?php tcm_gambar( 'tentang', 'pace3_logo', 'assets/img/pace-huruf-c.png' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'tentang', 'pace3_nama' ) ); ?>" style="height:54px;width:auto"></div>
        <h3><?php tcm_teks( 'tentang', 'pace3_nama' ); ?></h3><div class="en"><?php tcm_teks( 'tentang', 'pace3_sub' ); ?></div><p><?php tcm_teks( 'tentang', 'pace3_teks' ); ?></p>
      </div>
      <div class="val3 rv" style="--c:#006A4E">
        <div class="ic" style="background:transparent"><img src="<?php tcm_gambar( 'tentang', 'pace4_logo', 'assets/img/pace-huruf-e.png' ); ?>" alt="<?php echo esc_attr( tcm_kwt_nilai( 'tentang', 'pace4_nama' ) ); ?>" style="height:54px;width:auto"></div>
        <h3><?php tcm_teks( 'tentang', 'pace4_nama' ); ?></h3><div class="en"><?php tcm_teks( 'tentang', 'pace4_sub' ); ?></div><p><?php tcm_teks( 'tentang', 'pace4_teks' ); ?></p>
      </div>
    </div>
    <div class="pace rv"><img src="<?php tcm_gambar( 'tentang', 'gambar_pace', 'assets/img/value-holding-pace.png' ); ?>" alt="Value Holding PACE">
      <p><?php tcm_teks( 'tentang', 'pace_catatan' ); ?></p></div>
  </div>
</section>
<section style="background:var(--paper)" id="wilayah">
  <div class="wrap">
    <div class="rv">
      <div class="eyebrow"><?php tcm_teks( 'tentang', 'wil_eyebrow' ); ?></div>
      <h2 class="sec"><?php tcm_kaya( 'tentang', 'wil_judul' ); ?></h2>
      <p class="lede"><?php tcm_teks( 'tentang', 'wil_lede' ); ?></p>
    </div>
    <div class="spread">
      <div class="sp rv" style="--c:var(--navy)"><div class="dot"></div><b><?php tcm_teks( 'tentang', 'wil1_nama' ); ?></b><span><?php tcm_teks( 'tentang', 'wil1_ket' ); ?></span></div>
      <div class="sp rv" style="--c:var(--green)"><div class="dot"></div><b><?php tcm_teks( 'tentang', 'wil2_nama' ); ?></b><span><?php tcm_teks( 'tentang', 'wil2_ket' ); ?></span></div>
      <div class="sp rv" style="--c:var(--green)"><div class="dot"></div><b><?php tcm_teks( 'tentang', 'wil3_nama' ); ?></b><span><?php tcm_teks( 'tentang', 'wil3_ket' ); ?></span></div>
      <div class="sp rv" style="--c:var(--navy)"><div class="dot"></div><b><?php tcm_teks( 'tentang', 'wil4_nama' ); ?></b><span><?php tcm_teks( 'tentang', 'wil4_ket' ); ?></span></div>
      <div class="sp rv" style="--c:var(--orange)"><div class="dot"></div><b><?php tcm_teks( 'tentang', 'wil5_nama' ); ?></b><span><?php tcm_teks( 'tentang', 'wil5_ket' ); ?></span></div>
    </div>
    <div style="margin-top:40px;text-align:center">
      <a class="btn btn-o" href="<?php echo esc_url( home_url('/') ); ?>#jangkauan"><?php tcm_teks( 'tentang', 'peta_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</section>
<section>
  <div class="wrap">
    <div class="cta-band rv">
      <div><h2><?php tcm_teks( 'tentang', 'cta_judul' ); ?></h2>
        <p><?php tcm_teks( 'tentang', 'cta_teks' ); ?></p></div>
      <a class="btn btn-p" href="<?php echo esc_url( tcm_url( array('kontak','hubungi-kami'), '/kontak/' ) ); ?>" style="justify-self:end"><?php tcm_teks( 'tentang', 'cta_tombol' ); ?> &rarr;</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
