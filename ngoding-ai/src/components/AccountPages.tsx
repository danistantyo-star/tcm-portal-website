import { useState } from 'react';
import './account.css';

function GoogleMark() {
  return <svg viewBox="0 0 24 24" aria-hidden="true" width="20" height="20"><path fill="#4285F4" d="M21.6 12.23c0-.71-.06-1.39-.18-2.05H12v3.88h5.38a4.6 4.6 0 0 1-2 3.02v2.51h3.23c1.89-1.74 2.99-4.3 2.99-7.36Z"/><path fill="#34A853" d="M12 22c2.7 0 4.96-.9 6.61-2.41l-3.23-2.51c-.9.6-2.05.96-3.38.96-2.6 0-4.8-1.76-5.59-4.12H3.07v2.59A10 10 0 0 0 12 22Z"/><path fill="#FBBC05" d="M6.41 13.92a6 6 0 0 1 0-3.84V7.49H3.07a10 10 0 0 0 0 9.02l3.34-2.59Z"/><path fill="#EA4335" d="M12 5.96c1.47 0 2.79.5 3.82 1.5l2.87-2.87A9.61 9.61 0 0 0 12 2a10 10 0 0 0-8.93 5.49l3.34 2.59C7.2 7.72 9.4 5.96 12 5.96Z"/></svg>;
}

export function AuthPage({ mode }: { mode: 'sign-in' | 'sign-up' }) {
  const [notice, setNotice] = useState('');
  const signup = mode === 'sign-up';
  const redirect = new URLSearchParams(window.location.search).get('redirect');
  const switchHref = (signup ? '/sign-in' : '/sign-up') + (redirect ? '?redirect=' + encodeURIComponent(redirect) : '');
  function enterDemo() {
    try {
      localStorage.setItem('ngoding-demo-user', JSON.stringify({ name: 'Pengguna Demo', email: 'demo@local.test' }));
      const requested = new URLSearchParams(window.location.search).get('redirect');
      let destination = '/plan';
      if (requested?.startsWith('/') && !requested.startsWith('//')) {
        const parsed = new URL(requested, window.location.origin);
        if (parsed.origin === window.location.origin) destination = parsed.pathname + parsed.search + parsed.hash;
      }
      window.location.assign(destination);
    } catch {
      setNotice('Penyimpanan lokal tidak tersedia. Izinkan penyimpanan browser untuk menggunakan demo.');
    }
  }
  return <main className="account-auth">
    <section className="account-auth-box" aria-labelledby="account-auth-title">
      <h1 id="account-auth-title">{signup ? 'Create account' : 'Sign in'}</h1>
      <p className="account-auth-subtitle">{signup ? 'Get started with your free account' : 'Sign in to your account to continue'}</p>
      <button type="button" className="account-google" onClick={() => setNotice('Google belum dikonfigurasi pada aplikasi ini. Gunakan demo lokal untuk mencoba fitur tanpa akun Google.')}><GoogleMark /> {signup ? 'Sign up' : 'Sign in'} with Google</button>
      <p className="account-auth-switch">{signup ? 'Already have an account?' : "Don't have an account?"} <a href={switchHref}>{signup ? 'Sign in' : 'Sign up'}</a></p>
      <div className="account-demo">
        <p>Demo lokal · tanpa akun Google atau pembayaran.</p>
        <button type="button" onClick={enterDemo}>Coba demo lokal</button>
      </div>
      {notice && <p className="account-notice" role="status">{notice}</p>}
    </section>
  </main>;
}

type Period = 'monthly' | 'quarterly' | 'annual';
type Price = { price: string; original: string; discount?: string; total?: string; term?: string };

const prices: Record<Period, { starter: Price; pro: Price }> = {
  monthly: { starter: { price: '75k', original: '' }, pro: { price: '149k', original: '200k', discount: '25%' } },
  quarterly: { starter: { price: '66k', original: '75k', discount: '12%', total: '199.000', term: '3 bulan' }, pro: { price: '133k', original: '200k', discount: '34%', total: '399.000', term: '3 bulan' } },
  annual: { starter: { price: '49k', original: '75k', discount: '35%', total: '588.000', term: 'tahun' }, pro: { price: '99k', original: '149k', discount: '34%', total: '1.188.000', term: 'tahun' } },
};

function PriceLabel({ value }: { value: Price }) {
  return <>
    <div className="account-price"><strong>Rp {value.price}</strong><span>/bulan</span></div>
    {value.original && <p className="account-discount"><span className="account-sr-only">Harga sebelum diskon: </span><del>Rp {value.original}/bulan</del><span className="account-discount-badge">{value.discount} OFF</span></p>}
    {value.total && <p className="account-payment">Bayar <strong>Rp {value.total}</strong> /{value.term}</p>}
  </>;
}

export function PricingPage() {
  const [period, setPeriod] = useState<Period>('quarterly');
  const [notice, setNotice] = useState('');
  function choosePlan() {
    let hasDemoUser = false;
    try {
      const stored: unknown = JSON.parse(localStorage.getItem('ngoding-demo-user') || 'null');
      hasDemoUser = typeof stored === 'object' && stored !== null && 'name' in stored && typeof stored.name === 'string';
    } catch { /* Invalid or unavailable storage is treated as signed out. */ }
    if (!hasDemoUser) {
      window.location.assign('/sign-in?redirect=%2Fpricing');
      return;
    }
    setNotice('Ini demo lokal. Pembayaran dan aktivasi langganan belum terhubung. Tidak ada biaya yang dikenakan.');
  }
  return <main className="account-pricing">
    <div className="account-pricing-heading">
      <p className="account-bundle-banner"><span aria-hidden="true">♧</span> Dua aplikasi Pro, satu pembayaran</p>
      <h1>Pilih paket kamu</h1>
      <p>Upgrade untuk AI premium dan fitur lebih.</p>
    </div>
    <div className="account-period" role="group" aria-label="Periode pembayaran">
      <button type="button" aria-pressed={period === 'monthly'} onClick={() => setPeriod('monthly')}>1 Bulan</button>
      <button type="button" aria-pressed={period === 'quarterly'} onClick={() => setPeriod('quarterly')}>3 Bulan <span>Hemat</span></button>
      <button type="button" aria-pressed={period === 'annual'} onClick={() => setPeriod('annual')}>Tahunan</button>
    </div>
    <div className={`account-plans ${period === 'annual' ? 'account-plans-annual' : ''}`}>
      <section className="account-plan account-plan-starter">
        <h2>Starter{period === 'annual' ? ' Tahunan' : ''}</h2><PriceLabel value={prices[period].starter} />
        <p className="account-plan-description">Buat yang mulai serius.</p>
        <ul><li>5 PRD / bulan</li><li>Chat dengan AI mengenai planning PRD, fitur, task (100x/bln)</li><li>Download Markdown</li><li>Generate specs untuk fitur dan task</li></ul>
        <button type="button" className="account-plan-cta" onClick={choosePlan}>Pilih Starter{period === 'annual' ? ' Tahunan' : ''}</button>
      </section>
      <section className="account-plan account-plan-pro">
        <h2>Pro{period === 'annual' ? ' Tahunan' : ''}</h2><PriceLabel value={prices[period].pro} />
        <p className="account-plan-description">Unlimited, semua akses.</p>
        <ul><li>Unlimited PRD</li><li>Chat dengan AI mengenai planning PRD, fitur, task (unlimited)</li>{period === 'annual' && <li>Upload gambar &amp; dokumen referensi</li>}<li>Download Markdown</li><li>Chat langsung dengan Raf Dev untuk bantuan</li><li>Generate specs untuk fitur dan task</li></ul>
        <button type="button" className="account-plan-cta" onClick={choosePlan}>Pilih Pro{period === 'annual' ? ' Tahunan' : ''}</button>
      </section>
      <section className="account-plan account-plan-bundle">
        <span className="account-worth">♧ Paling Worth</span>
        <div className="account-bundle-icons" aria-hidden="true"><span />+<span /></div>
        <h2>Bundle Pro + DesainPakeAI</h2><PriceLabel value={{ price: '199k', original: '248k', discount: '20%' }} />
        <p className="account-bundle-comparison">dibanding beli kedua paket Pro terpisah untuk 30 hari</p>
        <p className="account-plan-description">Dari rencana ke desain, dua aplikasi Pro dalam satu pembelian.</p>
        <ul><li>1.000 kredit Canvas AI DesainPakeAI selama 30 hari</li><li>NgodingPakeAI Pro selama 30 hari</li><li>DesainPakeAI Pro selama 30 hari</li><li>Semua fitur paket Pro NgodingPakeAI</li><li>Aktivasi DesainPakeAI dengan email Google yang sama</li></ul>
        <button type="button" className="account-plan-cta account-plan-primary" onClick={choosePlan}>Pilih Bundle</button>
      </section>
    </div>
    {period !== 'monthly' && <p className="account-bundle-footnote">Bundle NgodingPakeAI + DesainPakeAI berlaku untuk 1 bulan.</p>}
    {notice && <p className="account-pricing-notice" role="status">{notice}</p>}
  </main>;
}
