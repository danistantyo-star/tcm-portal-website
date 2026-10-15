export interface PlanInput { name: string; idea: string; audience: string; platform: string; features: string; }
export interface Plan { id: string; name: string; createdAt: string; input: PlanInput; documents: Record<'prd'|'tasks'|'roadmap', string>; }
export const STORAGE_KEY = 'ngoding-local-plans-v1';
export function generatePlan(input: PlanInput): Plan {
  if (input.name.trim().length < 2 || input.idea.trim().length < 15) throw new Error('Nama minimal 2 karakter dan ide minimal 15 karakter.');
  const name = input.name.trim();
  const features = input.features.split(/[\n,;]/).map(s => s.trim()).filter(Boolean).slice(0, 20);
  if (!features.length) features.push('Pendaftaran dan pengelolaan profil', 'Dashboard ringkasan', 'Pencarian dan pengelolaan data', 'Ekspor laporan');
  const audience = input.audience.trim() || 'Pengguna yang membutuhkan solusi dalam deskripsi produk';
  const prd = `# ${name}\n\n> Draf lokal berbasis template. Tinjau kebutuhan, asumsi, dan kriteria sebelum implementasi.\n\n## 1. Ringkasan produk\n${input.idea.trim()}\n\n## 2. Pengguna dan tujuan\nTarget pengguna: ${audience}.\nPlatform: ${input.platform}.\nTujuan: membantu pengguna menyelesaikan kebutuhan yang dijelaskan dalam ringkasan dengan alur yang jelas dan dapat diukur.\n\n## 3. Ruang lingkup MVP\n${features.map((f,i)=>`${i+1}. ${f}`).join('\n')}\n\n## 4. Spesifikasi fitur\n${features.map(f=>`### ${f}\nSebagai ${audience}, saya dapat menggunakan ${f.toLowerCase()} agar kebutuhan inti saya terpenuhi.\n- Input divalidasi dan pesan kesalahan dapat dipahami.\n- Kondisi kosong, loading, berhasil, dan gagal tersedia.\n- Hasil tersimpan dan dapat dibuka kembali.\n- Kontrol bisa digunakan melalui keyboard.\n`).join('\n')}\n## 5. Kebutuhan nonfungsional\n- Tampilan responsif pada ponsel, tablet, dan desktop.\n- Otorisasi ditegakkan di server pada setiap akses data pengguna.\n- Rahasia dan API key tidak dikirim ke browser.\n- Data pribadi memiliki kebijakan retensi dan penghapusan yang jelas.\n- Pengujian mencakup alur berhasil, validasi, dan kegagalan layanan.\n\n## 6. Kriteria penerimaan\n${features.map(f=>`- Pengguna dapat menyelesaikan alur ${f.toLowerCase()} dan memuat ulang hasilnya.`).join('\n')}\n- Tidak ada kesalahan JavaScript yang tidak ditangani.\n- Data pengguna lain tidak dapat diakses tanpa izin.\n\n## 7. Pertanyaan terbuka\n- Siapa pemilik produk dan bagaimana keberhasilan diukur?\n- Integrasi eksternal, penyimpanan, dan model biaya apa yang dibutuhkan?\n- Apa batasan jadwal, anggaran, aksesibilitas, dan kepatuhan?\n`;
  const tasks = `# Task implementasi — ${name}\n\n## Persiapan\n- [ ] Tinjau PRD dan jawab pertanyaan terbuka.\n- [ ] Tentukan skema data, kontrak API, serta batas izin.\n- [ ] Siapkan repository, CI, dan konfigurasi environment.\n\n${features.map((f,i)=>`## ${i+1}. ${f}\n- [ ] Rancang state UI dan kriteria penerimaan.\n- [ ] Implementasikan komponen dan validasi input.\n- [ ] Implementasikan penyimpanan dan otorisasi di server.\n- [ ] Uji alur berhasil, kosong, error, dan pemuatan ulang.\n`).join('\n')}\n## Rilis\n- [ ] Jalankan typecheck, build, dan pengujian.\n- [ ] Periksa aksesibilitas dan tampilan responsif.\n- [ ] Konfigurasikan layanan produksi dan pemantauan.\n- [ ] Lakukan uji penerimaan bersama pemilik produk.\n`;
  const roadmap = `# Roadmap — ${name}\n\n## Fase 1: Validasi kebutuhan\nKonfirmasi masalah, pengguna (${audience}), metrik keberhasilan, dan batas MVP.\nHasil: PRD yang disetujui dan prioritas fitur.\n\n## Fase 2: Fondasi\nSiapkan ${input.platform}, sistem desain, skema data, autentikasi, dan pengujian.\nHasil: aplikasi dasar yang dapat dijalankan dan diuji.\n\n## Fase 3: Fitur inti\n${features.map(f=>`- ${f}`).join('\n')}\nHasil: alur pengguna utama dapat diselesaikan dari awal sampai akhir.\n\n## Fase 4: Verifikasi dan peluncuran\nUji fungsional, aksesibilitas, keamanan, dan performa. Tindak lanjuti temuan sebelum rilis.\nHasil: versi MVP dengan konfigurasi layanan nyata dan prosedur pemulihan.\n\n## Fase 5: Iterasi\nKumpulkan umpan balik, evaluasi metrik, dan susun prioritas berikutnya.\n\nCatatan: durasi setiap fase harus disepakati berdasarkan kapasitas tim; draf ini tidak mengasumsikan estimasi waktu.\n`;
  return { id: crypto.randomUUID(), name, createdAt: new Date().toISOString(), input: {...input,name}, documents: {prd,tasks,roadmap} };
}
export function loadPlans(): Plan[] {
  try {
    const data: unknown = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
    if (!Array.isArray(data)) return [];
    return data.filter((p): p is Plan => p && typeof p.id === 'string' && typeof p.name === 'string' && typeof p.createdAt === 'string' && p.input && typeof p.input.idea === 'string' && p.documents && ['prd','tasks','roadmap'].every(k => typeof p.documents[k] === 'string'));
  } catch { return []; }
}
export function savePlans(plans: Plan[]): void { localStorage.setItem(STORAGE_KEY, JSON.stringify(plans)); }
export function exportDocument(name: string, type: string, markdown: string): void {
  const url = URL.createObjectURL(new Blob([markdown], {type: 'text/markdown;charset=utf-8'}));
  const a = document.createElement('a'); a.href = url; a.download = `${name.toLowerCase().replace(/[^a-z0-9]+/g,'-').replace(/^-|-$/g,'') || 'plan'}-${type}.md`; a.click();
  setTimeout(() => URL.revokeObjectURL(url), 1000);
}
