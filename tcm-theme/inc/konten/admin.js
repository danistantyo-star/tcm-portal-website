/* TCM — Konten Website : pemilih gambar + pratinjau langsung
   Pratinjau dibangun dari atribut data-peran tiap kolom, jadi satu kode ini
   berlaku untuk semua halaman tanpa perlu ditulis ulang per halaman. */
( function ( $ ) {
	'use strict';

	$( function () {

		var $pratinjau = $( '#tcm-kw-pratinjau' );
		if ( ! $pratinjau.length ) {
			return;
		}

		/* ---------- 1. Pemilih gambar dari Pustaka Media ---------- */

		var bingkai = null;

		$( document ).on( 'click', '.tcm-kw-media-pilih', function ( e ) {
			e.preventDefault();
			var $wadah = $( this ).closest( '.tcm-kw-media' );

			var pustaka = $wadah.data( 'pustaka' ) || 'image';
			var video   = 'video' === pustaka;

			bingkai = wp.media( {
				title: video ? 'Pilih Video' : ( ( window.tcmKW && tcmKW.pilihGambar ) || 'Pilih Gambar' ),
				button: { text: video ? 'Gunakan video ini' : ( ( window.tcmKW && tcmKW.gunakan ) || 'Gunakan gambar ini' ) },
				library: { type: pustaka },
				multiple: false
			} );

			bingkai.on( 'select', function () {
				var berkas = bingkai.state().get( 'selection' ).first().toJSON();

				$wadah.find( '.tcm-kw-media-id' ).val( berkas.id );
				if ( video ) {
					$wadah.find( '.tcm-kw-media-pratinjau' )
						.html( $( '<code>' ).text( ( berkas.filename || berkas.url || '' ) ) );
				} else {
					var kecil = ( berkas.sizes && berkas.sizes.medium ) ? berkas.sizes.medium.url : berkas.url;
					$wadah.find( '.tcm-kw-media-pratinjau' ).html( $( '<img>' ).attr( 'src', kecil ) );
				}
				$wadah.find( '.tcm-kw-media-hapus' ).show();
				bangun();
			} );

			bingkai.open();
		} );

		$( document ).on( 'click', '.tcm-kw-media-hapus', function ( e ) {
			e.preventDefault();
			var $wadah = $( this ).closest( '.tcm-kw-media' );
			$wadah.find( '.tcm-kw-media-id' ).val( '' );
			$wadah.find( '.tcm-kw-media-pratinjau' ).empty();
			$( this ).hide();
			bangun();
		} );

		/* ---------- 1b. Pencarian kolom ---------- */
		/* Panel ini punya ratusan kolom. Kotak pencarian menyaring baris dan
		   kartu yang tidak cocok, supaya kolom yang dicari cepat ketemu. */
		var $cari  = $( '#tcm-kw-cari' );
		var $hasil = $( '#tcm-kw-cari-hasil' );

		function saring() {
			var kata = $.trim( ( $cari.val() || '' ).toLowerCase() );
			var $baris = $( '.tcm-kw-baris' );

			if ( ! kata ) {
				$baris.removeClass( 'tcm-kw-sembunyi' );
				$( '.tcm-kw-kartu' ).removeClass( 'tcm-kw-sembunyi' );
				$( '.tcm-kw-info-sel' ).closest( 'tr' ).removeClass( 'tcm-kw-sembunyi' );
				$hasil.text( '' );
				return;
			}

			var cocok = 0;
			$baris.each( function () {
				var isi = $( this ).data( 'cari' ) || '';
				var ada = String( isi ).indexOf( kata ) !== -1;
				$( this ).toggleClass( 'tcm-kw-sembunyi', ! ada );
				if ( ada ) { cocok++; }
			} );

			// kotak catatan ikut disembunyikan selama menyaring
			$( '.tcm-kw-info-sel' ).closest( 'tr' ).addClass( 'tcm-kw-sembunyi' );

			$( '.tcm-kw-kartu' ).each( function () {
				var adaIsi = $( this ).find( '.tcm-kw-baris' ).not( '.tcm-kw-sembunyi' ).length > 0;
				$( this ).toggleClass( 'tcm-kw-sembunyi', ! adaIsi );
			} );

			$hasil.text( cocok ? cocok + ' kolom cocok' : 'Tidak ada kolom yang cocok' );
		}

		if ( $cari.length ) {
			$cari.on( 'input', saring );
			$cari.on( 'keydown', function ( e ) {
				if ( 27 === e.keyCode ) { $cari.val( '' ); saring(); }
			} );
		}

		/* ---------- 2. Membaca nilai satu kolom ---------- */

		function bacaKolom( $el ) {
			// Editor teks kaya
			if ( $el.hasClass( 'tcm-kw-editor' ) ) {
				var ta = $el.find( 'textarea' ).first();
				var id = ta.attr( 'id' );
				if ( window.tinymce && id ) {
					var ed = tinymce.get( id );
					if ( ed && ! ed.isHidden() ) {
						return { html: ed.getContent() };
					}
				}
				return { html: ( ta.val() || '' ).replace( /\n/g, '<br>' ) };
			}

			// Pemilih gambar
			if ( $el.hasClass( 'tcm-kw-media' ) ) {
				var img = $el.find( '.tcm-kw-media-pratinjau img' ).attr( 'src' );
				return { gambar: img || '' };
			}

			// Kotak isian yang boleh mengandung <em>, <b>, <br>
			if ( $el.is( '[data-kaya]' ) ) {
				var mentah = $.trim( $el.val() || '' );
				return { teks: mentah.replace( /<[^>]*>/g, '' ), kaya: mentah };
			}

			// Kotak isian biasa
			return { teks: $.trim( $el.val() || '' ) };
		}

		// Pasang teks apa adanya, atau sebagai HTML kalau kolomnya bertipe "kaya".
		function pasang( $simpul, nilai ) {
			if ( undefined !== nilai.kaya ) {
				$simpul.html( nilai.kaya );
			} else {
				$simpul.text( nilai.teks );
			}
			return $simpul;
		}

		/* ---------- 3. Membangun kotak pratinjau ---------- */

		function bangun() {
			$pratinjau.empty();

			$( '.tcm-kw-kartu' ).each( function ( indeks ) {
				var $kartu  = $( this );
				var judulBg = $kartu.data( 'judul' ) || '';
				var hero    = ( 0 === indeks );

				var $blok = $( '<div>' ).addClass( hero ? 'pv-hero' : 'pv-blok' );
				var $isi  = hero ? $( '<div>' ).addClass( 'pv-hero-isi' ).appendTo( $blok ) : $blok;

				var tiles   = null;   // baris angka yang sedang dikumpulkan
				var terisi  = false;

				function tutupTiles() {
					if ( tiles && tiles.children().length ) {
						$isi.append( tiles );
						terisi = true;
					}
					tiles = null;
				}

				$kartu.find( '[data-peran]' ).each( function () {
					var $el   = $( this );
					var peran = $el.data( 'peran' );
					if ( ! peran ) {
						return;
					}
					var nilai = bacaKolom( $el );

					if ( 'nilai' === peran ) {
						if ( ! nilai.teks ) { return; }
						if ( ! tiles ) { tiles = $( '<div>' ).addClass( 'pv-angka' ); }
						tiles.append(
							$( '<div>' ).append( $( '<strong>' ).text( nilai.teks ) )
						);
						return;
					}

					if ( 'label' === peran ) {
						// Menempel pada angka terakhir kalau ada, kalau tidak jadi baris tebal.
						if ( tiles && tiles.children().length ) {
							var $akhir = tiles.children().last();
							if ( ! $akhir.find( 'span' ).length ) {
								$akhir.append( $( '<span>' ).text( nilai.teks || '' ) );
								return;
							}
						}
						tutupTiles();
						if ( nilai.teks ) {
							$isi.append( $( '<p>' ).addClass( 'pv-label' ).text( nilai.teks ) );
							terisi = true;
						}
						return;
					}

					tutupTiles();

					if ( 'gambar' === peran ) {
						if ( ! nilai.gambar ) { return; }
						if ( hero ) {
							$blok.css( 'background-image', 'url("' + nilai.gambar + '")' ).addClass( 'pv-hero-foto' );
						} else {
							$isi.append( $( '<img>' ).addClass( 'pv-gambar' ).attr( 'src', nilai.gambar ) );
						}
						terisi = true;
						return;
					}

					if ( 'judul' === peran && nilai.teks ) {
						$isi.append( pasang( $( hero ? '<h3>' : '<h4>' ), nilai ) );
						terisi = true;
						return;
					}

					if ( 'subjudul' === peran && nilai.teks ) {
						$isi.append( pasang( $( '<p>' ).addClass( 'pv-sub' ), nilai ) );
						terisi = true;
						return;
					}

					if ( 'tombol' === peran && nilai.teks ) {
						$isi.append(
							$( '<span>' ).addClass( hero ? 'pv-tombol' : 'pv-tombol pv-tombol-or' ).text( nilai.teks )
						);
						terisi = true;
						return;
					}

					if ( 'teks' === peran ) {
						if ( undefined !== nilai.html ) {
							if ( ! $.trim( nilai.html.replace( /<[^>]*>/g, '' ) ) ) { return; }
							// Pratinjau saja — isi yang disimpan tetap dibersihkan di sisi PHP.
							$isi.append( $( '<div>' ).addClass( 'pv-teks' ).html( nilai.html ) );
							terisi = true;
						} else if ( nilai.teks ) {
							$isi.append( pasang( $( '<p>' ).addClass( 'pv-teks' ), nilai ) );
							terisi = true;
						}
					}
				} );

				tutupTiles();

				if ( ! terisi ) {
					return; // Bagian yang seluruh isinya kosong tidak ditampilkan.
				}

				if ( ! hero && judulBg ) {
					$blok.prepend( $( '<div>' ).addClass( 'pv-bagian-nama' ).text( judulBg ) );
				}
				$pratinjau.append( $blok );
			} );

			if ( ! $pratinjau.children().length ) {
				$pratinjau.append( $( '<div>' ).addClass( 'pv-kosong' ).text( 'Belum ada isi yang diketik.' ) );
			}
		}

		/* ---------- 4. Pemicu ---------- */

		$( document ).on( 'input change', '.tcm-kw-input', bangun );

		if ( window.tinymce ) {
			$( document ).on( 'tinymce-editor-init', function ( event, editor ) {
				editor.on( 'keyup change', bangun );
			} );
		}

		bangun();
	} );

} )( jQuery );
