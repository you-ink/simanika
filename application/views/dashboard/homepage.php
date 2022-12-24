<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function () {
		FB.init({
			xfbml: true,
			version: 'v8.0'
		});
	};

	(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = 'https://connect.facebook.net/id_ID/sdk/xfbml.customerchat.js';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution=setup_tool page_id="2044562549128692" theme_color="#0084ff"
	logged_in_greeting="Hai! Jika anda ada pertanyaan, kritik dan saran silahkan ketik disini ~Admin JTI"
	logged_out_greeting="Hai! Apakah ada yang bisa kami bantu? ~Admin JTI" greeting_dialog_display="fade"
	greeting_dialog_delay="5" is_guest_user=false>
</div>

<div class="page">
	<div class="page-main">
		<div class="my-3 my-md-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 ml-auto">
						<div class="row mb-3">
							<div class="col-lg-12">
								<form class="input-icon my-3 my-lg-0" method="post"
									action="http://jti.polije.ac.id/form_visitors/search_article">
									<input class="form-control header-search" name="keyword" placeholder="Pencarian…"
										tabindex="1" type="text">
									<div class="input-icon-addon">
										<i class="fe fe-search"></i>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-12 mb-5">
								<div id="carousel-headline" class="carousel slide" data-ride="carousel"
									style="background-color: #000;">
									<ol class="carousel-indicators">
										<li data-target="#carousel-headline" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-headline" data-slide-to="1"></li>
										<li data-target="#carousel-headline" data-slide-to="2"></li>
										<li data-target="#carousel-headline" data-slide-to="3"></li>
										<li data-target="#carousel-headline" data-slide-to="4"></li>
										<li data-target="#carousel-headline" data-slide-to="5"></li>
										<li data-target="#carousel-headline" data-slide-to="6"></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active"
											style="background: url('http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/SERTIFIKAT%20AKREDITASI%20POLIJE%202020-2025.jpg') center center no-repeat; background-size: auto 450px;">
											<div class="carousel-caption p-3 animated slideInUp">
												<a target="_parent"
													href="https://drive.google.com/file/d/1-ZMM71z0gJUgWFT2oaq3POY-wcjcewFK/view">
													<h3 class="m-0 animated slideInLeft">Sertifikat Akreditasi
														Politeknik Negeri Jember 2020-2025 (B)</h3>
												</a>
												<p class="animated slideInLeft"> </p>
											</div>
										</div>
										<div class="carousel-item"
											style="background: url('http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/SERTIFIKAT%20AKREDITASI%20TIF%20POLIJE%202018-2023.jpg') center center no-repeat; background-size: auto 450px;">
											<div class="carousel-caption p-3 animated slideInUp">
												<a target="_parent"
													href="https://drive.google.com/file/d/1W6ZWjyQYyT_p7MHWAQw3pJ6fFUqcGieU/view">
													<h3 class="m-0 animated slideInLeft">Sertifikat Akreditasi Teknik
														Informatika (TIF) 2018-2023 (B)</h3>
												</a>
												<p class="animated slideInLeft"> </p>
											</div>
										</div>
										<div class="carousel-item"
											style="background: url('http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/akreditasi_tkk_2020.png') center center no-repeat; background-size: auto 450px;">
											<div class="carousel-caption p-3 animated slideInUp">
												<a target="_parent"
													href="https://drive.google.com/file/d/16XXg7sZX4WuNu1uyEYwPU_kcsbH72800/view?usp=sharing">
													<h3 class="m-0 animated slideInLeft">Selamat & Sukses Akreditasi
														Program Studi Teknik Komputer Meraih Peringkat Akreditasi A</h3>
												</a>
												<p class="animated slideInLeft"> </p>
											</div>
										</div>
										<div class="carousel-item"
											style="background: url('http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/akreditasi_mif_2020.png') center center no-repeat; background-size: auto 450px;">
											<div class="carousel-caption p-3 animated slideInUp">
												<a target="_parent"
													href="https://drive.google.com/file/d/14x6gQUoBSM3bO2sh_C9wXfK95jkw6QSQ/view?usp=sharing">
													<h3 class="m-0 animated slideInLeft">Selamat & Sukses Akreditasi
														Program Studi Manajemen Informatika Meraih Peringkat Akreditasi
														A</h3>
												</a>
												<p class="animated slideInLeft"> </p>
											</div>
										</div>
										<div class="carousel-item"
											style="background: url('http://jti.polije.ac.id/assets/img/akreditasi.png') center center no-repeat; background-size: auto 450px;">
											<div class="carousel-caption p-3 animated slideInUp">
												<a target="_parent" href="http://jti.polije.ac.id/akreditasi">
													<h3 class="m-0 animated slideInLeft">DOWNLOAD SALINAN SERTIFIKAT
														AKREDITASI PROGRAM STUDI DI JURUSAN TEKNOLOGI INFORMASI</h3>
												</a>
												<p class="animated slideInLeft"> </p>
											</div>
										</div>
										<div class="carousel-item"
											style="background: url('http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/profil_kajur_2019_2023.jpg') center center no-repeat; background-size: auto 450px;">
											<div class="carousel-caption p-3 animated slideInUp">
												<a target="_parent"
													href="http://jti.polije.ac.id/page/25-profil-ketua-jurusan-teknologi-informasi-periode-2019-2023">
													<h3 class="m-0 animated slideInLeft">Profil Ketua Jurusan Teknologi
														Informasi Periode 2019 - 2023</h3>
												</a>
												<p class="animated slideInLeft">Hendra Yufit Riskiawan, lahir di Jember,
													3 Pebruari 1983. Kehidupan masa kecil dari lahir hingga SMP tinggal
													di desa Lembengan, Kecamatan Ledokombo, Jember.</p>
											</div>
										</div>
										<div class="carousel-item"
											style="background: url('http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/Gedung-Jurusan-TI-full.jpg') center center no-repeat; background-size: auto 450px;">
											<div class="carousel-caption p-3 animated slideInUp">
												<a target="_parent" href="http://jti.polije.ac.id/profil-jti">
													<h3 class="m-0 animated slideInLeft">Profil Jurusan Teknologi
														Informasi</h3>
												</a>
												<p class="animated slideInLeft"> Sebagai Jurusan yang menjadi pusat
													pendidikan vokasi dan pengembangan teknologi informasi terapan yang
													unggul di tingkat Asia Tahun 2025.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="card card-aside text-white bg-blue-darkest">
									<div class="card-body pb-0">
										<h3 class="card-title"><strong><i class="fe fe-globe"></i> VISI DAN MISI
											</strong></h3>
										<div class="row">
											<div class="col-md-12 col-sm-12 text-justify">
												<p>Visi<br />
													<br />
													Puji dan syukur kami panjatkan kehadirat Allah SWT, Selamat datang
													di website resmi Jurusan Teknologi Informasi.<br />
													<br />
													Sekilas sejarah Jurusan Teknologi Informasi, didirikan pada tahun
													2007 dengan surat keputusan Direktorat Jenderal Pendidikan Tinggi
													Departemen Pendidikan Nasional Republik Indonesia <br />
													Nomor: SK Direktur No 3870/K14/KP/SK/2007 tanggal 25 Agustus 2007.
												</p>
												<p><a href="http://jti.polije.ac.id/sambutan"
														class="btn btn-outline-light">Lihat Selengkapnya <i
															class="fe fe-chevron-right"></i></a></p>
											</div>
											<!-- <div class="col-sm-4 kajur">
                                                        <img src="<?//= assets_url('images/kajur.png')?>" alt="JTI Polije" />
                                                    </div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-status bg-blue"></div>
									<div class="card-header">
										<h3 class="card-title"><i class="fe fe-rss"></i> <a
												href='http://jti.polije.ac.id/artikel'><strong>Berita JTI
													Polije</strong></a></h3>
										<div class="card-options">
											<a class="prev-owl" href="javascript:void(0)"><i
													class="fe fe-chevron-left"></i></a>
											<a class="next-owl" href="javascript:void(0)"><i
													class="fe fe-chevron-right"></i></a>
										</div>
									</div>
									<div class="card-body" style="height: 450px; overflow: auto; overflow-y: hidden;">
										<div class="row row-card row-deck">
											<div class="owl-carousel owl-theme">

												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/128-mahasiswa-tif-menjadi-salah-satu-presenter-icst-2022'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/Screen_Shot_2022-09-08_at_09_46_53.png) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/128-mahasiswa-tif-menjadi-salah-satu-presenter-icst-2022'>Mahasiswa
																TIF menjadi salah satu presenter ICST 2022</a></h4>
														<p class='text-muted'>Mahasiswa TIF menjadi salah satu present
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; September 08,2022
															</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Angga Gumilang</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/127-pelatihan-penulisan-artikel-ilmiah-bagi-dosen-jti-polije'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/WhatsApp_Image_2022-08-31_at_14_20_15.jpeg) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/127-pelatihan-penulisan-artikel-ilmiah-bagi-dosen-jti-polije'>Pelatihan
																Penulisan Artikel Ilmiah bagi Dosen JTI Polije</a></h4>
														<p class='text-muted'>Pelatihan Penulisan Artikel Ilmiah bagi
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; September 05,2022
															</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Angga Gumilang</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/126-kuliah-tamu-ui-ux-tahun-2022-bersama-algostudio'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/WhatsApp_Image_2022-07-14_at_09_27_50.jpeg) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/126-kuliah-tamu-ui-ux-tahun-2022-bersama-algostudio'>Kuliah
																Tamu UI / UX Tahun 2022 bersama Algostudio</a></h4>
														<p class='text-muted'>Kuliah Tamu UI / UX Tahun 2022 bersama A
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; July 23,2022</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Angga Gumilang</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/125-yudisium-24-jurusan-teknologi-informasi-politeknik-negeri-jember'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/yudisium-24.jpg) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/125-yudisium-24-jurusan-teknologi-informasi-politeknik-negeri-jember'>Yudisium
																24 Jurusan Teknologi Informasi Politeknik Negeri
																Jember</a></h4>
														<p class='text-muted'>Yudisium 24 Jurusan Teknologi Informasi
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; May 24,2022</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Admin</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/123-integrasi-hasil-riset-ke-pembelajaran-bersama-datains-dalam-bentuk-workshop-basic-datascience'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/WhatsApp_Image_2022-02-22_at_20_35_32.jpeg) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/123-integrasi-hasil-riset-ke-pembelajaran-bersama-datains-dalam-bentuk-workshop-basic-datascience'>Integrasi
																hasil riset ke pembelajaran bersama Datains dalam bentuk
																Workshop Basic Datascience</a></h4>
														<p class='text-muted'>Integrasi hasil riset ke pembelajaran be
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; February 22,2022
															</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Angga Gumilang</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/122-jti-polije-undang-penggagas-kampung-youtube-bondowoso'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/Workshop_Youtuber_1.jpeg) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/122-jti-polije-undang-penggagas-kampung-youtube-bondowoso'>JTI
																Polije Undang Penggagas Kampung Youtube Bondowoso</a>
														</h4>
														<p class='text-muted'>JTI Polije Undang Penggagas Kampung Yout
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; November 23,2021
															</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Admin</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/121-sharing-dan-diskusi-tentang-data-preparation-bersama-datains'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/WhatsApp_Image_2021-10-27_at_15_12_08.jpeg) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/121-sharing-dan-diskusi-tentang-data-preparation-bersama-datains'>Sharing
																dan Diskusi tentang Data Preparation Bersama Datains</a>
														</h4>
														<p class='text-muted'>Sharing dan Diskusi tentang Data Prepara
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; Octobar 27,2021
															</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Angga Gumilang</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/120-yudisium-ke-22-jurusan-teknologi-informasi-dilaksanakan-secara-daring'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/yudisium-22.jpg) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/120-yudisium-ke-22-jurusan-teknologi-informasi-dilaksanakan-secara-daring'>Yudisium
																Ke-22 Jurusan Teknologi Informasi Dilaksanakan Secara
																Daring</a></h4>
														<p class='text-muted'>Yudisium Ke-22 Jurusan Teknologi Informa
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; September 22,2021
															</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Admin</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/119-epim-hmj-ti-polije-2021-saring-54-finalis-dari-kampus-dan-smk-se-indonesia'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/IMG-20210913-WA0003.jpg) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/119-epim-hmj-ti-polije-2021-saring-54-finalis-dari-kampus-dan-smk-se-indonesia'>EPIM
																HMJ TI POLIJE 2021 SARING 54 FINALIS DARI KAMPUS DAN SMK
																SE-INDONESIA</a></h4>
														<p class='text-muted'>EPIM HMJ TI POLIJE 2021 SARING 54 FINALI
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; September 13,2021
															</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> Admin</div>
														</div>
													</div>
												</div>
												<div class='card'>
													<a
														href='http://jti.polije.ac.id/artikel/118-mengidentifikasi-dan-melaporkan-berita-hoax'>
														<div class='card-img-top'
															style='background:url(http://jti.polije.ac.id/an-component/media/upload-gambar-artikel-thumbs/Berita_Hoax.png) top center no-repeat'>
														</div>
													</a>
													<div class='card-body d-flex flex-column'>
														<h4><a
																href='http://jti.polije.ac.id/artikel/118-mengidentifikasi-dan-melaporkan-berita-hoax'>Mengidentifikasi
																dan Melaporkan Berita Hoax</a></h4>
														<p class='text-muted'>Mengidentifikasi dan Melaporkan Berita H
															...</p>
														<div class='row'>
															<div class='col-md-6 small'><i
																	class='fe fe-calendar'></i>&nbsp; July 18,2021</div>
															<div class='col-md-6 small text-right'><i
																	class='fe fe-user'></i> HMJ TI</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="card bg-blue-dark text-white">
									<div class="card-header">
										<h3 class="card-title"><i class="fe fe-flag"></i> <strong>Visi &amp;
												Misi</strong></h3>
										<div class="card-options">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
													class="fe fe-chevron-up"></i></a>
										</div>
									</div>
									<div class="card-body">
										<h4><strong>Visi</strong></h4>
										<p class=&doublequote;text-justify&doublequote;>JTI menetapkan visi tahun
											2020-2024 sebagai berikut :.</p>
										<p class=&doublequote;text-justify&doublequote;>“Mendukung visi dan misi Polije
											mewujudkan pendidikan vokasi yang unggul dan memiliki daya saing di bidang
											teknologi Informasi serta menghasilkan lulusan yang berkarakter”</p>
										<h4><strong>Misi</strong></h4>
										<p>Dalam rangka upaya mewujudkan Visi JTI, maka JTI menetapkan Misi yang terdiri
											dari :</p>
										<ol>
											<li>Meningkatkan pendidikan terapan di bidang teknologi informasi yang
												inovatif dan berdaya saing;</li>
											<li>Meningkatkan penelitian terapan, pengabdian kepada masyarakat dan
												kewirausahaan di bidang teknologi informasi untuk menghasilkan nilai
												tambah produk inovasi;</li>
											<li>Mewujudkan tata kelola JTI Polije yang lebih baik dalam rangka reformasi
												birokrasi (Good JTI Polije Governance );</li>
											<li>Mengembangkan kerjasama tingkat nasional maupun internasional.</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-card row-deck">
							<div class="col-xs-12 col-md-4">
								<div class="card">
									<a href="http://jti.polije.ac.id/prodi/mif"><img class='card-img-top'
											src='http://jti.polije.ac.id/an-theme/tabler-admin/assets/images/mif.png'></a>
									<table class="table card-table">
										<tbody>
											<tr>
												<td width="1"><span class="avatar avatar-blue">MIF</span></td>
												<td>
													<h4><a href="http://jti.polije.ac.id/prodi/mif">Manajemen
															Informatika</a></h4>
												</td>
												<td class="text-right"><span class="text-muted"></span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-xs-12 col-md-4">
								<div class="card">
									<a href="http://jti.polije.ac.id/prodi/tkk"><img class='card-img-top'
											src='http://jti.polije.ac.id/an-theme/tabler-admin/assets/images/tkk.png'></a>
									<table class="table card-table">
										<tbody>
											<tr>
												<td width="1"><span class="avatar avatar-green">TKK</span></td>
												<td>
													<h4><a href="http://jti.polije.ac.id/prodi/tkk">Teknik Komputer</a>
													</h4>
												</td>
												<td class="text-right"><span class="text-muted"></span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-xs-12 col-md-4">
								<div class="card">
									<a href="http://jti.polije.ac.id/prodi/tif"><img class='card-img-top'
											src='http://jti.polije.ac.id/an-theme/tabler-admin/assets/images/tif.png'></a>
									<table class="table card-table">
										<tbody>
											<tr>
												<td width="1"><span class="avatar avatar-pink">TIF</span></td>
												<td>
													<h4><a href="http://jti.polije.ac.id/prodi/tif">Teknik
															Informatika</a></h4>
												</td>
												<td class="text-right"><span class="text-muted"></span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title"><i class="fe fe-file-text"></i> <strong>Administrasi
												&amp; Layanan</strong></h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="card card-aside">
													<a href="http://jti.polije.ac.id/page/8-alur-pendaftaran-praktek-kerja-lapang"
														class="card-aside-column bg-cyan">
														<h1 class="text-white" id="stamp"><img
																src="http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/pkl.png"
																alt="" width="70">
															<!-- <i class="fe fe-briefcase"></i> -->
														</h1>
													</a>
													<div class="card-body d-flex flex-column">
														<h4>Alur Pendaftaran Praktek Kerja Lapang (PKL)</h4>
														<p></p>
														<a href="http://jti.polije.ac.id/page/8-alur-pendaftaran-praktek-kerja-lapang"
															class="btn btn-cyan btn-outline"><i
																class="fe fe-arrow-right-circle"></i> More Info</a>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="card card-aside">
													<a href="http://jti.polije.ac.id/page/9-syarat-pendaftaran-tugas-akhir"
														class="card-aside-column bg-green">
														<h1 class="text-white" id="stamp"><img
																src="http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/ta.png"
																alt="" width="70"><!-- <i class="fe fe-award"></i> -->
														</h1>
													</a>
													<div class="card-body d-flex flex-column">
														<h4>Syarat Pendaftaran Tugas Akhir (TA)</h4>
														<p></p>
														<a href="http://jti.polije.ac.id/page/9-syarat-pendaftaran-tugas-akhir"
															class="btn btn-green btn-outline"><i
																class="fe fe-arrow-right-circle"></i> More Info</a>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="card card-aside">
													<a href="http://jti.polije.ac.id/page/10-syarat-pendaftaran-yudisium"
														class="card-aside-column bg-pink">
														<h1 class="text-white" id="stamp"><img
																src="http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/yudisium.png"
																alt="" width="70"><!-- <i class="fe fe-home"></i> -->
														</h1>
													</a>
													<div class="card-body d-flex flex-column">
														<h4>Pendaftaran Pra-Yudisium & Bebas Tanggungan Online</h4>
														<p></p>
														<a href="http://jti.polije.ac.id/page/24-info-bebas-tanggungan-untuk-pendaftaran-pra-yudisium"
															class="btn btn-pink btn-outline"><i
																class="fe fe-arrow-right-circle"></i> More Info</a>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="card card-aside">
													<a href="http://jti.polije.ac.id/page/22-alur-perwalian-mahasiswa-khs"
														class="card-aside-column bg-red">
														<h1 class="text-white" id="stamp"><img
																src="http://jti.polije.ac.id/an-component/media/upload-gambar-pendukung/khs.png"
																alt="" width="70"><!-- <i class="fe fe-users"></i> -->
														</h1>
													</a>
													<div class="card-body d-flex flex-column">
														<h4>Alur Perwalian Mahasiswa (KHS)</h4>
														<p></p>
														<a href="http://jti.polije.ac.id/page/22-alur-perwalian-mahasiswa-khs"
															class="btn btn-red btn-outline-dark"><i
																class="fe fe-arrow-right-circle"></i> More Info</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="card d-lg-none">
									<div class="card-header bg-red text-white">
										<h4 class="card-title"><strong>SEKILAS INFO</strong></h4>
									</div>
									<table class="table card-table">
										<tbody>

											<tr>
												<td>
													<h6><a href='#'>Mulai tanggal 17-29 Maret 2020 perkuliahan dialihkan
															ke moda daring di: http://jti.polije.ac.id/elearning untuk
															mengantisipasi penyebaran virus COVID-19</a></h6>
												</td>
											</tr>
											<tr>
												<td>
													<h6><a href='#'>KETUA JURUSAN TEKNOLOGI INFORMASI PERIODE 2019-2023
															: Hendra Yufit Riskiawan, S.Kom, M.Cs Terhitung Mulai
															Tanggal 1 Juni 2019</a></h6>
												</td>
											</tr>
											<tr>
												<td>
													<h6><a
															href='http://jti.polije.ac.id/page/24-info-bebas-tanggungan-untuk-pendaftaran-pra-yudisium'>[INFO]
															BEBAS TANGGUNGAN UNTUK PENDAFTARAN PRA YUDISIUM</a></h6>
												</td>
											</tr>
											<tr>
												<td>
													<h6><a href='http://jti.polije.ac.id/page/15-kode-etik-mahasiswa'>Tata
															Tertib & Kode Etik Mahasiswa</a></h6>
												</td>
											</tr>
											<tr>
												<td>
													<h6><a href='https://www.instagram.com/jtipolije/'>Silahkan Follow
															Akun Instagram Jurusan Teknologi Informasi @jtipolije</a>
													</h6>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<style type="text/css">
									iframe#instagram-embed-0 {
										min-width: 274px !important
									}

								</style>
								<blockquote class="instagram-media"
									style="background: #FFF; border: 0; border-radius: 3px; box-shadow: 0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width: 540px; min-width: 274px; padding: 0; width: calc(100% - 2px);"
									data-instgrm-permalink="https://www.instagram.com/p/Cd79VgCJLGc/"
									data-instgrm-version="12">
									<div style="padding: 16px;">
										<div style="display: flex; flex-direction: row; align-items: center;"> </div>
										<div style="padding: 19% 0;"> </div>
										<div style="display: block; height: 50px; margin: 0 auto 12px; width: 50px;">
										</div>
										<div style="padding-top: 8px;">
											<div
												style="color: #3897f0; font-family: Arial,sans-serif; font-size: 14px; font-style: normal; font-weight: 550; line-height: 18px;">
												View this post on Instagram</div>
										</div>
										<p
											style="color: #c9c8cd; font-family: Arial,sans-serif; font-size: 14px; line-height: 17px; margin-bottom: 0; margin-top: 8px; overflow: hidden; padding: 8px 0 7px; text-align: center; text-overflow: ellipsis; white-space: nowrap;">
											<a style="color: #c9c8cd; font-family: Arial,sans-serif; font-size: 14px; font-style: normal; font-weight: normal; line-height: 17px; text-decoration: none;"
												href="https://www.instagram.com/p/Cd79VgCJLGc/" target="_blank">A post
												shared by Jurusan Teknologi Informasi (@jtipolije)</a> on <time
												style="font-family: Arial,sans-serif; font-size: 14px; line-height: 17px;"
												datetime="2019-07-04T14:51:40+00:00">Jul 4, 2019 at 7:51am PDT</time>
										</p>
									</div>
								</blockquote>
								<div class="card">
									<div class="card-header bg-cyan text-white">
										<h4 class="card-title"><strong>CIVITAS</strong></h4>
									</div>
									<table class="table card-table">
										<tbody>
											<tr>
												<td width="1">
													<h1><i class="fa fa-black-tie text-muted"></i></h1>
												</td>
												<td>
													<h4><a href="http://jti.polije.ac.id/dosen">Dosen</a></h4>
												</td>
												<td class="text-right"><span class="text-muted"></span></td>
											</tr>
											<tr>
												<td>
													<h1><i class="fa fa-wrench text-muted"></i></h1>
												</td>
												<td>
													<h4><a href="http://jti.polije.ac.id/staf">Admin &amp; Staf</a></h4>
												</td>
												<td class="text-right"><span class="text-muted"></span></td>
											</tr>
											<tr>
												<td>
													<h1><i class="fa fa-graduation-cap text-muted"></i></h1>
												</td>
												<td>
													<h4><a href="http://jti.polije.ac.id/alumni">Alumni</a></h4>
												</td>
												<td class="text-right"><span class="text-muted"></span></td>
											</tr>
											<tr>
												<!-- <td><h1><i class="fa fa-users text-muted"></i></h1></td> -->
												<td colspan="3" align="center"><a href="https://www.hmjti-polije.com/"
														target="_blank"><img
															src="http://jti.polije.ac.id/assets/img/hmjti_logo.png"
															width='50%' alt="HMJTI LOGO"></a></td>
												<!-- <td class="text-right"><span class="text-muted"></span></td> -->
											</tr>
										</tbody>
									</table>
								</div>
								<!-- <iframe src="<?//= $biodata['link-fb'] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="width: 100%; min-height:200px;"></iframe> -->
								<iframe
									src="https://www.youtube.com/embed/ingZnc5WHKg?rel=0&showinfo=0&autoplay=0&vq=tiny "
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen style="width: 100%; min-height:200px;"></iframe>
								<div class="card mt-3">
									<table class="table card-table text-muted">
										<tbody>
											<tr>
												<td><a href='http://jti.polije.ac.id/tif-psdku-sidoarjo/'
														target='_blank'>Web TIF PSDKU Sidoarjo</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://jti.polije.ac.id/elearning'
														target='_blank'>Elearning JTI</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://jtit.polije.ac.id/' target='_blank'>Publikasi
														JTIT</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://pusatkarir.polije.ac.id' target='_blank'>Pusat Karir
														POLIJE</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://sim-online.polije.ac.id/' target='_blank'>SIM
														Online</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://103.109.209.245/jtiform/login'
														target='_blank'>Evaluasi Pembelajaran</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://jti.polije.ac.id/jtisurat' target='_blank'>JTI
														Surat</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://jti.polije.ac.id/ruangbaca' target='_blank'>Ruang
														Baca</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://jti.polije.ac.id/galeri' target='_self'>Galeri
														JTI</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
											<tr>
												<td><a href='http://arsip.jti.polije.ac.id/' target='_blank'>Arsip
														JTI</a></td>
												<td class='text-right'><i class='fe fe-chevron-right'></i></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="card">
									<div class="card-header bg-blue text-white">
										<h4 class="card-title"><strong>JTI Social</strong></h4>
									</div>
									<table class="table card-table">
										<tbody>
											<tr>
												<td width="1"><span class="avatar bg-blue"><i
															class="fa fa-facebook text-white"></i></span></td>
												<td><a href="http://facebook.com/jtipolije" target="_blank">Facebook
														(@jtipolije)</a></td>
											</tr>
											<!-- <tr><td width="1"><span class="avatar bg-teal"><i class="fa fa-twitter text-white"></i></span></td><td><a href="#" target="_blank">Twitter</a></td></tr>
                                                    <tr><td width="1"><span class="avatar bg-red-dark"><i class="fa fa-google-plus text-white"></i></span></td><td><a href="#" target="_blank">Google</a></td></tr> -->
											<tr>
												<td width="1"><span class="avatar bg-red"><i
															class="fa fa-youtube-play text-white"></i></span></td>
												<td><a href="https://www.youtube.com/c/jtipolije"
														target="_blank">Youtube</a></td>
											</tr>
											<tr>
												<td width="1"><span class="avatar bg-pink-dark"><i
															class="fa fa-instagram text-white"></i></span></td>
												<td><a href="http://instagram.com/jtipolije" target="_blank">Instagram
														(@jtipolije)</a></td>
											</tr>
											<tr>
												<td width="1"><span class="avatar bg-teal"><i
															class="fa fa-envelope text-white"></i></span></td>
												<td><a href="mailto:jti1@polije.ac.id" target="_blank">Email
														(jti1@polije.ac.id)</a></td>
											</tr>
										</tbody>
									</table>
								</div>
								<iframe
									src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fjtipolije%2F&tabs&width=275&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=495782487508917"
									width="275" height="130" style="border:none;overflow:auto" scrolling="yes"
									frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
								<div class="card card-collapsed">
									<div class="card-status card-status-left bg-blue-darkest"></div>
									<div class="card-header">
										<h3 class="card-title"><strong>Admin Website</strong></h3>
										<div class="card-options">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
													class="fe fe-chevron-up"></i></a>
										</div>
									</div>
									<div class="card-body">
										<div class="media">
											<span class="avatar avatar-xxl mr-5"
												style="background-image: url(http://jti.polije.ac.id/an-theme/tabler-admin/assets/images/admin.png)"></span>
											<div class="media-body">
												<h4 class="m-0">David Juli Ariyadi, S.Kom</h4>
												<p class="text-muted mb-0">Admin / Teknisi</p>
												<p><small>david_juli@polije.ac.id</small></p>
												<ul class="social-links list-inline mb-0 mt-2">
													<li class="list-inline-item">
														<a href="http://www.facebook.com/djuliar" title=""
															target="_blank" data-toggle="tooltip"
															data-original-title="Facebook"><i
																class="fa fa-facebook"></i></a>
													</li>
													<li class="list-inline-item">
														<a href="http://www.twitter.com/djuliar" title=""
															target="_blank" data-toggle="tooltip"
															data-original-title="Twitter"><i
																class="fa fa-twitter"></i></a>
													</li>
													<li class="list-inline-item">
														<a href="http://www.instagram.com/djuliar" title=""
															target="_blank" data-toggle="tooltip"
															data-original-title="Instagram"><i
																class="fa fa-instagram"></i></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<center>
											<!-- <a href="http://livetrafficfeed.com/website-counter" id="LTF_counter_href" target="_blank"><img id="LTF_counter_src" src="//livetrafficfeed.com/static/static-counter/feed.png?d=jti.polije.ac.id&c=fe43b8c48f930a2e0151525afa7fb0af&timezone=Asia%2FJakarta&r=305792660" alt="Free Visitors Counter" style="width: 100%;"></a><script src="//livetrafficfeed.com/static/static-counter/live.js?457340556"></script><noscript><a href="http://livetrafficfeed.com/website-counter">Free Visitors Counter</a></noscript> -->
										</center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer bg-blue-darkest text-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="row">
					<div class="col-md-6">
						<h4 class="menu-title">Internal Link</h4>
						<ul class="list-unstyled mb-0">
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://jti.polije.ac.id/tif-psdku-sidoarjo/' target='_blank'>Web TIF PSDKU
									Sidoarjo</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://jti.polije.ac.id/elearning' target='_blank'>Elearning JTI</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://jtit.polije.ac.id/' target='_blank'>Publikasi JTIT</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://pusatkarir.polije.ac.id' target='_blank'>Pusat Karir POLIJE</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://sim-online.polije.ac.id/' target='_blank'>SIM Online</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://103.109.209.245/jtiform/login' target='_blank'>Evaluasi
									Pembelajaran</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://jti.polije.ac.id/jtisurat' target='_blank'>JTI Surat</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://jti.polije.ac.id/ruangbaca' target='_blank'>Ruang Baca</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://jti.polije.ac.id/galeri' target='_self'>Galeri JTI</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://arsip.jti.polije.ac.id/' target='_blank'>Arsip JTI</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<h4 class="menu-title">Eksternal Link</h4>
						<ul class="list-unstyled mb-0">
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://polije.ac.id/' target='_blank'>Politeknik Negeri Jember</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='http://ristekdikti.go.id/' target='_blank'>Ristekdikti</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='https://pintu.polije.ac.id/' target='_blank'>Pintu POLIJE</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='https://pibkwu.polije.ac.id/' target='_blank'>PIBKWU POLIJE</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='https://lsp.polije.ac.id/' target='_blank'>LSP P1 POLIJE</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='https://perpustakaan.polije.ac.id/' target='_blank'>Perpustakaan POLIJE</a>
							</li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='https://pena.polije.ac.id/' target='_blank'>Pena POLIJE</a></li>
							<li class='py-2 ml-4 border-bottom border-secondary'><i class='fe fe-link'></i> <a
									href='https://publikasi.polije.ac.id/' target='_blank'>Jurnal POLIJE</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mt-4 mt-lg-0">
				<div class="row">
					<div class="col-md-12">
						<h4>ABOUT ME - <small>tentang kami</small></h4>
						<div class="row pt-5">
							<div class="col-md-5 text-justify">
								Jika ada pesan, kesan, kritik dan saran atau ada artikel yang kurang layak
								dipublikasikan. Silahkan hubungi saya melalui kontak form pada <a
									href="http://jti.polije.ac.id/kontak-kami"
									style="text-decoration: underline">tautan</a> berikut atau email kami.
							</div>
							<div class='col-md-7'>
								<h3>Jurusan Teknologi Informasi</h3>
								<h4>Politeknik Negeri Jember</h4>
								<i class='fe fe-home'></i> Jl. Mastrip PO.BOX 164 Jember<br />Jember Jawa Timur 68101
								Indonesia <br />
								<i class='fe fe-phone'></i> Tlp :<span class='angka'> 0331-333532</span><br />
								<i class='fe fe-printer'></i> Fax :<span class='angka'> 0331-333531</span><br />
								<i class='fe fe-mail'></i> kajurti@polije.ac.id <br />
								<i class='fe fe-mail'></i> jti1@polije.ac.id <br />
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-md-12">
						<h4 class="menu-title">Partnership - <small>kerjasama</small></h4>
						<ul>
							<a href="#" target="_blank"><img src="https://jti.polije.ac.id/assets/img/oracle.png"
									height="50"></a>
							<a href="https://www.cisco.com/" target="_blank"><img
									src="https://jti.polije.ac.id/assets/img/sisco.png" height="75"></a>
							<a href="http://www.agilecampus.org/" target="_blank"><img
									src="https://jti.polije.ac.id/assets/img/agile-campus.png" height="25"></a>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="footer bg-gray-dark-darkest">
	<div class="container">
		<div class="row align-items-center flex-row-reverse">
			<div class="col-auto ml-lg-auto">
				<div class="row align-items-center">
					<div class="col-auto">
						<a href="https://facebook.com/jtipolije" class="btn btn-sm btn-facebook" target="_blank"><i
								class="fe fe-facebook"></i></a>
						<a href="https://www.youtube.com/channel/UCyjE1iZi_oXfVqJFzlM-WAQ"
							class="btn btn-sm btn-youtube" target="_blank"><i class="fa fa-youtube"></i></a>
						<a href="https://instagram.com/jtipolije" class="btn btn-sm btn-instagram" target="_blank"><i
								class="fa fa-instagram"></i></a>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-auto mt-3 mt-lg-0">
				&copy; 2022 Jurusan Teknologi Informasi - Politeknik Negeri Jember</a><br>Page rendered in
				<strong>0.1273</strong> seconds.
			</div>
		</div>
	</div>
</footer>
</div>
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/plugins/owlcarousel/owl.carousel.js"></script>
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/js/masonry.pkgd.min.js"></script>
<!-- Toastr -->
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/plugins/toastr/js/toastr.js"></script>
<!-- Require -->
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/js/require.min.js"></script>
<script>
	requirejs.config({
		baseUrl: 'http://jti.polije.ac.id/an-theme/tabler-admin'
	});

</script>
<!-- Dashboard Core -->
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/js/dashboard.js"></script>
<!-- c3.js Charts Plugin -->
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/plugins/charts-c3/plugin.js"></script>
<!-- Google Maps Plugin -->
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/plugins/maps-google/plugin.js"></script>
<!-- Input Mask Plugin -->
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/plugins/input-mask/plugin.js"></script>
<!-- jsSocials -->
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/plugins/jssocials/jssocials.min.js"></script>
<!-- Breaking News Ticker -->
<script
	src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/plugins/breaking-news-ticker/breaking-news-ticker.min.js">
</script>
<!-- TosRUs -->
<script src="http://jti.polije.ac.id/an-theme/tabler-admin/assets/plugins/tosrus/js/jquery.tosrus.all.min.js"></script>
<!-- Recaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script async defer src="https://platform.instagram.com/en_US/embeds.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145718096-1"></script>
<script src="https://cdn.jsdelivr.net/npm/publicalbum@latest/embed-ui.min.js" async></script>

<script type="text/javascript">
	var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
	var bulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
		'Nopember', 'Desember'
	];

	var tanggal = new Date().getDate();
	var _hari = new Date().getDay();
	var _bulan = new Date().getMonth();
	var _tahun = new Date().getYear();

	var hari = hari[_hari];
	var bulan = bulan[_bulan];
	var tahun = (_tahun < 1000) ? _tahun + 1900 : _tahun;

	$('.today-date').html('<i class="fe fe-clock"></i> ' + hari + ', ' + tanggal + ' ' + bulan + ' ' + tahun);

</script>
<script>
	$('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
		if (!$(this).next().hasClass('show')) {
			$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
		}
		var $subMenu = $(this).next(".dropdown-menu");
		$subMenu.toggleClass('show');


		$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
			$('.dropdown-submenu .show').removeClass("show");
		});

		return false;
	});

	var owl = $('.owl-carousel');
	owl.owlCarousel({
		items: 3,
		loop: true,
		margin: 5,
		dots: false,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
			},
			600: {
				items: 3,
			},
		}
	});
	$(".next-owl").on('click', function () {
		owl.trigger('next.owl');
	})
	$(".prev-owl").on('click', function () {
		owl.trigger('prev.owl');
	})
	$("#share").jsSocials({
		showLabel: false,
		showCount: false,
		shares: ["facebook", "twitter", "email", "whatsapp"],
	});

</script>
<script>
	$(function () {
		$('.g-recaptcha').attr('data-sitekey', '6LdQ4R0UAAAAAF45VpyVRqGyZh_nqFk1ZIJYcSfv');

		$("#kontak-form").on("submit", function (evt) {
			evt.preventDefault();
			if (!$(this)[0].mengirim) {
				__this = $(this)
				__this[0].mengirim = true;
				var val = __this.serialize();
				var action = __this.attr("action");
				__this.find(".cssload-container").show();
				$.ajax({
					type: "POST",
					url: action,
					data: val,
					cache: false,
					dataType: 'json',
					success: function (a) {
						if (a.status == 'sukses') {
							toastr.success(
								"Pesan anda terkirim. Terima kasih telah mengubungi kami",
								"Sukses");
							$('form#kontak-form')[0].reset();
							grecaptcha.reset();
						} else if (a.status == 'error') {
							toastr.error(a.name, "Error");
						}
					},
					error: function () {
						toastr.error("Cek koneksi internet anda", "Error");
					},
					complete: function () {
						grecaptcha.reset();
						__this[0].mengirim = false;
					}
				});
			}
		});

		var $grid = $('.grid').masonry({
			itemSelector: '.grid-item',
			gutter: 5
		});
		$grid.imagesLoaded().progress(function () {
			$grid.masonry('layout');
		});

		$('.galeri').masonry({
			itemSelector: '.galeri-item',
		});

		$(".grid a").tosrus({
			caption: {
				add: true
			}
		});

		// $('marquee').mouseover(function() {
		//     $(this).attr('scrollamount',0);
		// }).mouseout(function() {
		//      $(this).attr('scrollamount',5);
		// });

		$('#breaking-news-ticker').breakingNews({
			effect: 'typography',
			themeColor: '#cd201f'
		});

		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-center-screen",
			"preventDuplicates": true,
			"onclick": null,
			"showDuration": "200",
			"hideDuration": "1000",
			"timeOut": "2000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	});

</script>
