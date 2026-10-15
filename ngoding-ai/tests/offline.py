from playwright.sync_api import sync_playwright
with sync_playwright() as p:
 b=p.chromium.launch(executable_path='/usr/bin/chromium',headless=True,args=['--no-sandbox'])
 page=b.new_page(viewport={'width':1440,'height':1000},accept_downloads=True)
 errors=[];requests=[]
 page.on('pageerror',lambda e:errors.append(str(e)))
 page.on('request',lambda r:requests.append(r.url[:100]))
 try:
  page.goto('http://127.0.0.1:8767/Ngoding-AI.html')
  page.get_by_role('heading',name='Mau ngapain hari ini?').wait_for()
  assert page.locator('.brand img').evaluate('e=>e.naturalWidth>0')
  print('PASS embedded home and logo',flush=True)
  page.get_by_role('link',name='Bikin Plan',exact=False).click()
  page.get_by_role('button',name='Coba demo lokal').click()
  page.get_by_role('link',name='Proyek baru',exact=False).click()
  page.locator('#idea-prompt').fill('Aplikasi tracking cash advance dari foto struk dan invoice menjadi laporan dengan lampiran PDF.')
  page.get_by_role('button',name='Buat PRD',exact=True).click()
  page.get_by_role('heading',name='Preferensi teknologi').wait_for()
  print('PASS demo and idea navigation',flush=True)
  page.get_by_role('button',name='Lanjutkan',exact=False).click()
  for _ in range(5):page.get_by_role('button',name='Lewati',exact=True).first.click()
  page.get_by_role('button',name='Lanjutkan',exact=False).click()
  page.locator('.fmap-feature').first.wait_for()
  assert page.locator('.fmap-feature').count()==7
  page.screenshot(path='research/local/offline-map.png',full_page=True)
  print('PASS technology, questions, map',flush=True)
  page.get_by_role('button',name='Lanjutkan',exact=False).click()
  page.get_by_role('tab',name='PRD',exact=True).wait_for()
  assert 'PDF memuat rekap' in page.locator('#plan-panel').inner_text()
  page.reload();page.get_by_role('tab',name='PRD',exact=True).wait_for()
  with page.expect_download() as dl:page.get_by_role('button',name='Unduh .md',exact=False).click()
  assert dl.value.suggested_filename.endswith('.md')
  assert errors==[],errors
  assert not any(x.startswith(('http://','https://')) and not x.startswith('http://127.0.0.1:8767/Ngoding-AI.html') for x in requests),requests
  print('PASS PRD, reload persistence, download; no external requests or JS errors.',flush=True)
 except Exception:
  print('URL',page.url[:120]);print('BODY',page.locator('body').inner_text()[:1500]);print('ERRORS',errors)
  raise
 finally:b.close()
