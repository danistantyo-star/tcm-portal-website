import { useEffect, useState } from 'react';
import type { ReactNode } from 'react';
import { AuthPage, PricingPage } from './components/AccountPages';
import { TemplatesPage, TemplateDetail } from './components/Templates';
import { PlanPage } from './components/PlanPage';
import { WizardPage } from './components/WizardPage';
import planArt from './assets/card-1-0.svg?raw';
import designArt from './assets/card-2-0.svg?raw';
import chatArt from './assets/card-3-0.svg?raw';
import templateArt from './assets/card-4-0.svg?raw';

export function Icon({ name, size = 18 }: { name: string; size?: number }) {
  const paths: Record<string, ReactNode> = {
    sun: <><circle cx="12" cy="12" r="4" /><path d="M12 2v2m0 16v2M2 12h2m16 0h2M5 5l1.4 1.4m11.2 11.2L19 19M5 19l1.4-1.4M17.6 6.4 19 5" /></>,
    moon: <path d="M21 13a9 9 0 1 1-10-10 7 7 0 0 0 10 10Z" />,
    users: <><circle cx="9" cy="8" r="3" /><path d="M3 21v-3a6 6 0 0 1 12 0v3m2-17a3 3 0 0 1 0 6m2 11v-3a6 6 0 0 0-3-5" /></>,
    file: <><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z" /><path d="M14 2v6h6M8 13h8m-8 4h6" /></>,
    arrow: <path d="m9 5 7 7-7 7" />,
    flame: <><path d="M12 3c2 5-2 5-2 8 2-1 3-3 3-3s5 3 5 7a6 6 0 0 1-12 0c0-4 4-6 6-12Z" /><path d="M12 13c-3 3-2 5 0 5s3-2 0-5Z" /></>,
    box: <><path d="m12 2 10 5-10 5L2 7Zm-10 5v10l10 5 10-5V7M12 12v10M7 4.5l10 5" /></>,
    download: <><path d="M12 3v12m-5-5 5 5 5-5M3 16v5h18v-5" /></>,
    plus: <path d="M12 5v14M5 12h14" />,
    check: <path d="m5 12 4 4L19 6" />,
    close: <path d="m6 6 12 12M6 18 18 6" />,
    logout: <><path d="M9 4H3v16h6m4-12 4 4-4 4m-6-4h14" /></>,
  };
  return <svg width={size} height={size} viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true">{paths[name] || paths.file}</svg>;
}
function readUser(): { name: string } | null {
  try { const u: unknown = JSON.parse(localStorage.getItem('ngoding-demo-user') || 'null'); return u && typeof u === 'object' && 'name' in u && typeof u.name === 'string' && u.name.trim() ? {name:u.name} : null; } catch { return null; }
}
const cards = [
  { title: 'Bikin Plan', description: 'Dari ide jadi PRD, spec fitur dan task yang siap dipake AI coding agent', art: planArt, href: '/plan', badge: 'UPDATE BARU' },
  { title: 'DesainPakeAI', description: 'Rancang tampilan website dan aplikasi bareng AI, dari ide sampai prototipe.', art: designArt, href: 'https://desainpakeai.com/' },
  { title: 'AndalAI', description: 'Ngechat dan bikin PRD dengan GPT-5.6, Opus 5, Kimi K3, Deepseek, dan model lainnya.', art: chatArt, href: 'https://andalai.id/' },
  { title: 'Template', description: 'Gunakan kerangka codebase untuk bikin aplikasi irit token, lebih aman, siap untuk production', art: templateArt, href: '/templates' },
];
function Home() {
  return <main className="home-page"><div className="home-inner">
    <a className="promo-pill" href="/pricing"><Icon name="flame" size={14} />PROMO hingga 51%<Icon name="arrow" size={12} /></a>
    <h1>Mau ngapain hari ini?</h1>
    <div className="home-grid">{cards.map(card => <a key={card.title} className="feature-card" href={card.href} {...(card.href.startsWith('https:') ? { target: '_blank', rel: 'noopener noreferrer' } : {})}>
      {card.badge && <span className="new-badge">{card.badge}</span>}
      <div className="card-art" aria-hidden="true" dangerouslySetInnerHTML={{ __html: card.art }} />
      <h2>{card.title}</h2><p>{card.description}</p>
      {card.href.startsWith('https:') && <span className="visually-hidden"> (buka layanan eksternal di tab baru)</span>}
    </a>)}</div>
  </div></main>;
}
export default function App() {
  const [theme, setTheme] = useState(() => { try { return localStorage.getItem('ngoding-theme') || 'dark'; } catch { return 'dark'; } });
  const [user] = useState(readUser);
  const [menu, setMenu] = useState(false);
  const [stage,setStage] = useState(0);
  const path = window.location.pathname.replace(/\/$/, '') || '/';
  useEffect(() => {
    document.documentElement.dataset.theme = theme;
    try { localStorage.setItem('ngoding-theme', theme); } catch { /* Persistence is optional. */ }
  }, [theme]);
  useEffect(() => {
    const titles: Record<string, string> = { '/': 'Ngoding Pake AI — Bikin PRD untuk AI Coding & Komunitas Terbesar Indonesia', '/pricing': 'Harga — Ngoding Pake AI', '/templates': 'Template — Ngoding Pake AI', '/sign-in': 'Sign in — Ngoding Pake AI', '/sign-up': 'Sign up — Ngoding Pake AI', '/plan': 'Bikin Plan — Ngoding Pake AI' };
    document.title = titles[path] || 'Ngoding Pake AI';
    if ((path === '/plan' || path.startsWith('/plans/')) && !user) window.location.replace('/sign-in?redirect=' + encodeURIComponent(path + window.location.search));
  }, [path, user]);
  useEffect(() => { const listener = (e: Event) => setStage((e as CustomEvent<number>).detail); window.addEventListener('ngoding-plan-stage',listener); return () => window.removeEventListener('ngoding-plan-stage',listener); }, []);
  const flow = new URLSearchParams(window.location.search).get('flow');
  const stepLabels = flow === 'existing' ? ['Copy prompt','Analisis codebase','Dokumentasi tersimpan'] : ['Ide','PRD','Task'];
  let content: ReactNode;
  if (path === '/') content = <Home />;
  else if (path === '/sign-in' || path === '/sign-up') content = <AuthPage mode={path === '/sign-in' ? 'sign-in' : 'sign-up'} />;
  else if (path === '/pricing') content = <PricingPage />;
  else if (path === '/templates') content = <TemplatesPage />;
  else if (path.startsWith('/templates/')) content = <TemplateDetail slug={path.slice('/templates/'.length)} />;
  else if (path.startsWith('/plans/')) content = user ? <WizardPage id={path.slice('/plans/'.length)} /> : <main className="loading-page">Membuka halaman masuk…</main>;
  else if (path === '/plan') content = user ? <PlanPage /> : <main className="loading-page">Membuka halaman masuk…</main>;
  else content = <main className="not-found"><span className="not-found-code">404</span><h1>Halaman tidak ditemukan</h1><p>Yuk, kembali dan mulai dari idemu.</p><a className="primary-button" href="/">Kembali ke beranda</a></main>;
  if(path.startsWith('/plans/'))return <div className="app-shell">{content}</div>;
  return <div className="app-shell">
    <a className="skip-link" href="#main-content">Lewati navigasi</a>
    <header className="site-header">
      <a className="brand" href="/" aria-label="ngodingpakeai — beranda"><img src="/reference/logo.svg" alt="" /><span>ngodingpakeai</span></a>
      {path === '/plan' && user ? ((flow || stage > 0) && <nav className="header-steps" aria-label="Tahapan plan">{stepLabels.map((label,index)=><span key={label} className={index===stage?'active':''}><i/>{label}</span>)}</nav>) : <div className="header-stats" aria-label="Statistik komunitas referensi"><span><Icon name="users" /><b>50.4K</b> User</span><span><Icon name="file" /><b>24.9K</b> PRD</span></div>}
      <nav className="header-actions" aria-label="Akun dan tampilan">
        <button className="icon-button theme-toggle" onClick={() => setTheme(theme === 'dark' ? 'light' : 'dark')} aria-label={theme === 'dark' ? 'Aktifkan tema terang' : 'Aktifkan tema gelap'} title={theme === 'dark' ? 'Tema terang' : 'Tema gelap'}><Icon name={theme === 'dark' ? 'sun' : 'moon'} /></button>
        {user ? <><span className="free-badge">Free</span><a className="login-button" href="/pricing">Upgrade</a><div className="user-menu"><button className="user-avatar" aria-label="Menu akun demo" aria-expanded={menu} onClick={()=>setMenu(!menu)}>D</button>{menu&&<div className="user-dropdown"><strong>{user.name}</strong><small>Akun demo lokal</small><a href="/plan">Bikin Plan</a><a href="/plan?view=history">Plan sebelumnya</a><button onClick={() => { localStorage.removeItem('ngoding-demo-user'); window.location.replace('/'); }}>Keluar</button></div>}</div></> : <a className="login-button" href={'/sign-in' + (path === '/' ? '' : '?redirect=' + encodeURIComponent(path))}>Log in</a>}
      </nav>
    </header>
    <div id="main-content" className="page-content" tabIndex={-1}>{content}</div>
    <footer className="site-footer"><span>Product by</span><a className="creator-pill" href="https://www.youtube.com/@rafiul_m" target="_blank" rel="noopener noreferrer"><span className="creator-avatar">R</span><strong>Raf Dev</strong><small>35.1K</small><svg viewBox="0 0 24 24" width="17" height="17" aria-label="YouTube"><path fill="#ff0000" d="M21 7a3 3 0 0 0-2-2c-4-.5-10-.5-14 0a3 3 0 0 0-2 2 31 31 0 0 0 0 10 3 3 0 0 0 2 2c4 .5 10 .5 14 0a3 3 0 0 0 2-2 31 31 0 0 0 0-10Z"/><path fill="#10172b" d="m10 9 5 3-5 3Z"/></svg></a><a className="discord-link" href="https://discord.com/invite/K66VSJnVTH" target="_blank" rel="noopener noreferrer" aria-label="Komunitas Discord"><svg viewBox="0 0 24 24" width="25" height="25" fill="currentColor" aria-hidden="true"><path d="M19 4a18 18 0 0 0-4-1l-.6 1.3a15 15 0 0 0-5 0L8.8 3a18 18 0 0 0-4 1C2.3 8 1.6 12 2 16c2 2 4 2.7 6 3l1-1.7-2-1a12 12 0 0 0 10 0l-2 1 1 1.7c2-.3 4-1 6-3 .5-5-1-9-3-12ZM8 14c-1 0-1.5-.8-1.5-1.8S7 10.4 8 10.4s1.5.8 1.5 1.8S9 14 8 14Zm8 0c-1 0-1.5-.8-1.5-1.8s.5-1.8 1.5-1.8 1.5.8 1.5 1.8S17 14 16 14Z" /></svg></a></footer>
  </div>;
}
