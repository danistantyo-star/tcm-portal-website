(function(){
  var hd=document.getElementById('hd');
  var onScroll=function(){ hd.classList.toggle('solid', window.scrollY>70); };
  onScroll(); window.addEventListener('scroll',onScroll,{passive:true});

  var bg=document.getElementById('bg'), nav=document.getElementById('nav');
  if(bg && nav){
    bg.addEventListener('click',function(){ nav.classList.toggle('open'); });
    nav.addEventListener('click',function(e){ if(e.target.tagName==='A') nav.classList.remove('open'); });
  }


  var fb=document.querySelectorAll('.filt'), pit=document.querySelectorAll('.pitem');
  fb.forEach(function(b){ b.addEventListener('click',function(){
    fb.forEach(function(x){x.classList.remove('on')}); b.classList.add('on');
    var f=b.dataset.f;
    pit.forEach(function(p){ p.classList.toggle('hide', f!=='all' && p.dataset.c!==f); });
  });});

  var tb=document.querySelectorAll('.tab'), pn=document.querySelectorAll('.panel');
  tb.forEach(function(b){ b.addEventListener('click',function(){
    tb.forEach(function(x){x.classList.remove('on')}); b.classList.add('on');
    pn.forEach(function(p){ p.classList.toggle('on', p.dataset.p===b.dataset.t); });
  });});


  var lb=document.getElementById('lb'), lbi=document.getElementById('lbi'), lbc=document.getElementById('lbc');
  if(lb && lbi){
    document.querySelectorAll('.cthumb[data-zoom], .orgwrap[data-org]').forEach(function(t){
      t.addEventListener('click',function(){
        var im=t.querySelector('img'); if(!im) return;
        lbi.src=im.src; if(lbc) lbc.textContent=t.dataset.cap||'';
        lb.classList.add('on'); document.body.style.overflow='hidden';
      });
    });
    var closeLb=function(){ lb.classList.remove('on'); lbi.src=''; document.body.style.overflow=''; };
    lb.addEventListener('click',function(e){ if(e.target===lb||e.target.classList.contains('x')) closeLb(); });
    document.addEventListener('keydown',function(e){ if(e.key==='Escape') closeLb(); });
  }


  var io=new IntersectionObserver(function(es){
    es.forEach(function(en){ if(en.isIntersecting){ en.target.classList.add('in'); io.unobserve(en.target);} });
  },{threshold:.12,rootMargin:'0px 0px -40px 0px'});
  document.querySelectorAll('.rv').forEach(function(el,i){
    el.style.transitionDelay=(i%3)*0.07+'s'; io.observe(el);
  });
})();


/* ---------- Tambahan tema TCM v3.3 ---------- */
(function(){

  /* 1. Slider Instagram */
  var track = document.getElementById('igTrack');
  if (track) {
    var slider = track.closest('.ig-slider');
    var prev   = slider.querySelector('.ig-nav.prev');
    var next   = slider.querySelector('.ig-nav.next');
    var langkah = function(){
      var kartu = track.querySelector('.ig-card');
      return kartu ? kartu.getBoundingClientRect().width + 16 : 240;
    };
    var perbaruiTombol = function(){
      var mentok = track.scrollWidth - track.clientWidth - 4;
      if (prev) prev.hidden = track.scrollLeft <= 2;
      if (next) next.hidden = track.scrollLeft >= mentok;
    };
    if (prev) prev.addEventListener('click', function(){ track.scrollLeft -= langkah(); });
    if (next) next.addEventListener('click', function(){ track.scrollLeft += langkah(); });
    track.addEventListener('scroll', perbaruiTombol, {passive:true});
    window.addEventListener('resize', perbaruiTombol);
    perbaruiTombol();
  }

  /* 2. Foto galeri bisa diklik untuk diperbesar */
  var lb  = document.getElementById('lb');
  var lbi = document.getElementById('lbi');
  var lbc = document.getElementById('lbc');
  if (lb && lbi) {
    document.querySelectorAll('.gal figure, .edok figure').forEach(function(f){
      f.addEventListener('click', function(){
        var im = f.querySelector('img');
        if (!im) return;
        lbi.src = im.currentSrc || im.src;
        var cap = f.querySelector('figcaption');
        if (lbc) lbc.textContent = cap ? cap.textContent.trim() : (im.alt || '');
        lb.classList.add('on');
        document.body.style.overflow = 'hidden';
      });
    });
  }

})();
