"""Behavior tests against the running app; BASE_URL can select dev or production preview."""
import json
import os
import tempfile
import unittest
from pathlib import Path
from playwright.sync_api import sync_playwright

BASE=os.environ.get('BASE_URL','http://127.0.0.1:5173')
ARTIFACTS=Path(__file__).resolve().parent.parent/'research/local'
class AppTests(unittest.TestCase):
 @classmethod
 def setUpClass(cls):
  cls.pw=sync_playwright().start()
  cls.browser=cls.pw.chromium.launch(executable_path='/usr/bin/chromium',headless=True,args=['--no-sandbox'])
  ARTIFACTS.mkdir(parents=True,exist_ok=True)
 @classmethod
 def tearDownClass(cls):cls.browser.close();cls.pw.stop()
 def setUp(self):
  self.context=self.browser.new_context(viewport={'width':1440,'height':1000},accept_downloads=True,permissions=['clipboard-read','clipboard-write'])
  self.page=self.context.new_page();self.errors=[];self.page.on('pageerror',lambda e:self.errors.append(str(e)))
 def tearDown(self):
  self.context.close();self.assertEqual(self.errors,[])
 def go(self,path='/'):self.page.goto(BASE+path);self.page.wait_for_load_state('networkidle')
 def demo(self):
  self.go('/sign-in?redirect=%2Fplan');self.page.get_by_role('button',name='Coba demo lokal').click();self.page.wait_for_url('**/plan')
 def create(self):
  self.demo();self.page.get_by_role('link',name='Proyek baru').click();self.page.locator('#idea-prompt').fill('Dashboard CRM untuk tim sales dengan pipeline penjualan dan pengelolaan kontak.')
  self.page.get_by_role('button',name='Buat PRD',exact=True).click();self.finish_wizard()
 def finish_wizard(self):
  self.page.wait_for_url('**/plans/**?step=2');self.page.get_by_role('button',name='Lanjutkan',exact=False).click()
  self.page.wait_for_url('**?step=3')
  for _ in range(5):self.page.get_by_role('button',name='Lewati',exact=True).first.click()
  self.page.get_by_role('button',name='Lanjutkan',exact=False).click();self.page.wait_for_url('**?step=4')
  self.page.get_by_role('button',name='Lanjutkan',exact=False).click();self.page.wait_for_url('**?step=5');self.page.get_by_role('tab',name='PRD',exact=True).wait_for()
 def test_home_assets_and_outbound_links(self):
  self.go();self.assertEqual(self.page.locator('.feature-card').count(),4)
  self.assertTrue(self.page.locator('.brand img').evaluate('e=>e.naturalWidth>0'))
  self.assertEqual(self.page.locator('.card-art svg').count(),4)
  self.assertEqual(self.page.get_by_role('link',name='DesainPakeAI',exact=False).get_attribute('href'),'https://desainpakeai.com/')
  self.assertEqual(self.page.get_by_role('link',name='AndalAI',exact=False).get_attribute('href'),'https://andalai.id/')
  self.page.screenshot(path=str(ARTIFACTS/'home-desktop.png'),full_page=True)
 def test_theme_persists_across_reload(self):
  self.go();self.page.get_by_role('button',name='Aktifkan tema terang').click();self.page.reload()
  self.assertEqual(self.page.locator('html').get_attribute('data-theme'),'light')
  self.page.get_by_role('button',name='Aktifkan tema gelap').click();self.assertEqual(self.page.locator('html').get_attribute('data-theme'),'dark')
 def test_guest_plan_gate_and_invalid_session(self):
  self.go('/plan');self.page.wait_for_url('**/sign-in?redirect=%2Fplan')
  self.page.evaluate("localStorage.setItem('ngoding-demo-user','123')");self.go('/plan');self.page.wait_for_url('**/sign-in?redirect=%2Fplan')
 def test_demo_choice_flow(self):
  self.demo();self.assertEqual(self.page.locator('h1').inner_text(),'Mau mulai dari mana?')
  self.page.get_by_role('link',name='Proyek baru').click();self.assertEqual(self.page.locator('h1').inner_text(),'Mau bikin apa?')
  self.assertTrue(self.page.get_by_role('button',name='Buat PRD',exact=True).is_disabled())
  self.page.locator('#idea-prompt').fill('Terlalu pendek');self.assertTrue(self.page.get_by_role('button',name='Buat PRD',exact=True).is_disabled())
 def test_create_edit_reload_copy_and_download(self):
  self.create();self.assertIn('Dashboard CRM',self.page.locator('#plan-panel').inner_text())
  self.page.get_by_role('button',name='Edit dokumen').click();self.page.locator('#document-edit').fill('# PRD revisi\n\nCatatan tersimpan.')
  self.page.get_by_role('button',name='Simpan perubahan').click();self.page.reload();self.assertIn('Catatan tersimpan.',self.page.locator('#plan-panel').inner_text())
  self.page.get_by_role('button',name='Salin',exact=True).click();self.assertIn('PRD revisi',self.page.evaluate('navigator.clipboard.readText()'))
  with self.page.expect_download() as download:self.page.get_by_role('button',name='Unduh .md',exact=False).click()
  self.assertTrue(download.value.suggested_filename.endswith('-prd.md'))
  content=Path(download.value.path()).read_text();self.assertIn('Catatan tersimpan.',content)
  self.page.get_by_role('tab',name='Task',exact=True).click();self.assertIn('Task implementasi',self.page.locator('#plan-panel').inner_text())
  self.page.get_by_role('tab',name='Roadmap',exact=True).click();self.assertIn('Fase 1',self.page.locator('#plan-panel').inner_text())
  self.page.screenshot(path=str(ARTIFACTS/'plan-document.png'),full_page=True)
 def test_delete_plan_confirmation(self):
  self.create();self.page.get_by_role('button',name='Hapus Dashboard',exact=False).click();self.page.get_by_role('button',name='Batal',exact=True).click()
  self.assertEqual(self.page.locator('.plan-sidebar li').count(),1)
  self.page.get_by_role('button',name='Hapus Dashboard',exact=False).click();self.page.get_by_role('button',name='Hapus plan',exact=True).click()
  self.page.wait_for_url('**/plan?flow=new');self.assertEqual(self.page.evaluate("JSON.parse(localStorage.getItem('ngoding-local-plans-v1')).length"),0)
 def test_reference_and_template_dialog(self):
  self.demo();self.go('/plan?flow=new');self.page.get_by_role('button',name='Referensi',exact=False).click()
  self.page.get_by_label('URL website atau dokumentasi').fill('https://example.com/docs');self.page.get_by_role('button',name='Tambahkan referensi',exact=True).click()
  self.assertIn('example.com',self.page.locator('.flow-reference-tags').inner_text())
  self.page.get_by_role('button',name='Template',exact=False).click();self.page.get_by_role('button',name='Starter Next JS',exact=False).click()
  self.page.locator('#idea-prompt').fill('Aplikasi kalender tim untuk mengatur jadwal kerja dan pertemuan bersama.')
  self.page.get_by_role('button',name='Buat PRD',exact=True).click();self.finish_wizard()
  self.assertIn('https://example.com/docs',self.page.locator('#plan-panel').inner_text());self.assertIn('Starter Next JS',self.page.locator('#plan-panel').inner_text())
 def test_existing_project_prompt_and_import(self):
  self.demo();self.go('/plan?flow=existing');self.page.get_by_role('button',name='Copy',exact=False).click()
  self.assertIn('plan-summary.json',self.page.evaluate('navigator.clipboard.readText()'))
  self.page.get_by_role('button',name='Perbesar prompt').click();self.assertIn('Tidak diperlukan token bootstrap',self.page.locator('.existing-prompt').inner_text())
  data={'name':'Proyek Existing','idea':'Sistem laporan inventory yang sudah mempunyai katalog barang dan manajemen gudang.','features':'Kelola barang\nLaporan stok'}
  self.page.locator('#import-summary').set_input_files({'name':'plan-summary.json','mimeType':'application/json','buffer':json.dumps(data).encode()})
  self.assertIn('Proyek Existing',self.page.locator('#plan-panel').inner_text())
 def test_invalid_import_and_corrupt_saved_plans(self):
  self.demo();self.go('/plan?flow=existing');self.page.locator('#import-summary').set_input_files({'name':'broken.json','mimeType':'application/json','buffer':b'{}'})
  self.assertIn('name dan idea',self.page.get_by_role('alert').inner_text())
  self.page.evaluate("localStorage.setItem('ngoding-local-plans-v1','{broken')");self.go('/plan?view=history');self.assertEqual(self.page.locator('h1').inner_text(),'Belum ada plan')
 def test_sign_out_and_not_found(self):
  self.demo();self.page.get_by_role('button',name='Menu akun demo').click();self.page.get_by_role('button',name='Keluar',exact=True).click()
  self.page.wait_for_url(BASE+'/');self.assertTrue(self.page.get_by_role('link',name='Log in').is_visible());self.go('/does-not-exist');self.assertIn('tidak ditemukan',self.page.locator('h1').inner_text())
 def test_cash_advance_wizard_and_graph_persistence(self):
  self.demo();self.go('/plan?flow=new');self.page.locator('#idea-prompt').fill('Aplikasi tracking laporan cash advance dengan foto struk/invoice, langsung tercatat dan foto menjadi lampiran laporan PDF.')
  self.page.get_by_role('button',name='Buat PRD',exact=True).click();self.page.wait_for_url('**?step=2')
  self.page.get_by_role('button',name='Pilih sendiri',exact=False).click();self.page.get_by_label('Frontend',exact=True).fill('Next.js');self.page.reload();self.assertEqual(self.page.get_by_label('Frontend',exact=True).input_value(),'Next.js')
  self.page.screenshot(path=str(ARTIFACTS/'wizard-tech.png'),full_page=True)
  self.page.get_by_role('button',name='Lanjutkan',exact=False).click();self.page.wait_for_url('**?step=3')
  self.assertTrue(self.page.get_by_role('button',name='Lanjutkan',exact=False).is_disabled())
  self.page.get_by_placeholder('Ketik jawaban...').fill('Staf lapangan saat ini mengumpulkan struk lalu mengetik ulang ke Excel.')
  self.page.get_by_role('button',name='Isi laporan otomatis',exact=True).click()
  for choice in ['Isi form otomatis','Foto jadi lampiran','Simpan riwayat laporan']:self.page.get_by_role('button',name=choice,exact=True).click()
  self.assertTrue(self.page.get_by_role('button',name='Foto dari WhatsApp',exact=True).is_disabled())
  self.page.get_by_role('button',name='Hemat waktu',exact=True).click();self.page.get_by_role('button',name='Ekspor PDF kapan saja',exact=True).click()
  self.page.reload();self.assertEqual(self.page.get_by_role('button',name='Foto jadi lampiran',exact=True).get_attribute('aria-pressed'),'true')
  self.page.screenshot(path=str(ARTIFACTS/'wizard-questions.png'),full_page=True)
  self.page.get_by_role('button',name='Lanjutkan',exact=False).click();self.page.wait_for_url('**?step=4')
  self.assertEqual(self.page.locator('.fmap-feature').count(),7)
  self.page.get_by_role('button',name='Perbesar peta',exact=True).click();self.page.get_by_role('button',name='Sesuaikan peta ke layar',exact=True).click()
  self.page.get_by_role('button',name='Detail fitur Daftar & Riwayat Laporan, fase 2',exact=True).click();self.page.get_by_label('Fase pengembangan').select_option('1');self.page.get_by_role('button',name='Simpan perubahan',exact=True).click();self.page.reload()
  self.assertTrue(self.page.get_by_role('button',name='Detail fitur Daftar & Riwayat Laporan, fase 1',exact=True).is_visible())
  self.page.screenshot(path=str(ARTIFACTS/'feature-map-desktop.png'),full_page=True)
  self.page.get_by_role('button',name='Lanjutkan',exact=False).click();self.page.wait_for_url('**?step=5')
  text=self.page.locator('#plan-panel').inner_text();self.assertIn('Lapor Cash Advance',text);self.assertIn('Next.js',text);self.assertIn('Staf lapangan',text);self.assertIn('PDF memuat rekap transaksi beserta foto',text)
 def test_responsive_routes(self):
  self.demo()
  for width in [390,768,1440]:
   self.page.set_viewport_size({'width':width,'height':844})
   for path in ['/','/plan','/plan?flow=new','/plan?flow=existing','/pricing','/templates','/templates/saas-template']:
    with self.subTest(width=width,path=path):
     self.go(path)
     self.assertTrue(self.page.evaluate('document.documentElement.scrollWidth <= innerWidth'),path)
   self.go('/plan?flow=new');self.page.screenshot(path=str(ARTIFACTS/f'plan-new-{width}.png'),full_page=True)
  self.go('/');self.page.set_viewport_size({'width':390,'height':844});self.page.screenshot(path=str(ARTIFACTS/'home-mobile.png'),full_page=True)
if __name__=='__main__':unittest.main(verbosity=2)
