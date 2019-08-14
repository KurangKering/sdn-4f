
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>#</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/icons/icomoon/styles.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/bootstrap.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/core.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/components.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/colors.css')  ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->


	<link href="<?= base_url('assets/plugins/toastr/toastr.css')  ?>" rel="stylesheet" type="text/css">

	<style>
		.video-js {
			position: relative !important;
			width: 100% !important;
			height: auto !important;
		}
		vjs-poster {
			position: absolute !important;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
		}
	</style>
	@yield('css')

	<script>
		const _BASE_URL = '<?=base_url();?>';
		const _CURRENT_URL = '<?=current_url();?>';
		const _SITE_URL = '<?=site_url();?>';

	</script>
	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/plugins/loaders/pace.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/core/libraries/jquery.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/core/libraries/bootstrap.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/plugins/loaders/blockui.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/toastr/toastr.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/dropzone.js')  ?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->

	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/core/app.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/kostum.js')  ?>"></script>

	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="<?= base_url('assets/template/backend/assets/images/logo_light.png')  ?>" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				
			</ul>

			<p class="navbar-text">
				<span class="label bg-success">Online</span>
			</p>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					
					<li><a href="{{ site_url('auth/do_logout') }}"><i class="icon-switch2"></i> Logout</a></li>

					

					
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					{{-- <div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Admin</span>
									
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div> --}}
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion"><!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="{{ site_url('admin/dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li><a href="{{ site_url('admin/pengguna') }}"><i class="icon-home4"></i> <span>Data Pengguna</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Posts</span></a>
									<ul>
										<li><a href="{{ site_url('admin/kategori_berita') }}">Kategori Berita</a></li>
										<li><a href="{{ site_url('admin/berita') }}">Berita</a></li>
										<li><a href="#">Agenda</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Pages</span></a>
									<ul>
										<li><a href="{{ site_url('admin/pages/profil') }}">Profil</a></li>
										<li><a href="{{ site_url('admin/pages/visi_misi') }}">Visi Misi</a></li>
										<li><a href="{{ site_url('admin/pages/sambutan') }}">Sambutan Kepala Sekolah</a></li>
										<li><a href="{{ site_url('admin/data_guru_pegawai') }}"><span>Data Guru & Pegawai</span></a></li>
										<li><a href="{{ site_url('admin/struktur_organisasi') }}"><span>Struktur Organisasi</span></a></li>
										<li><a href="{{ site_url('admin/fasilitas/ruangan') }}"><span>Ruangan</span></a></li>
										<li><a href="{{ site_url('admin/fasilitas/elektronik') }}"><span>Elektronik</span></a></li>
										<li><a href="{{ site_url('admin/fasilitas/moubiler') }}"><span>Moubiler</span></a></li>
										<li><a href="{{ site_url('admin/fasilitas/inventaris') }}"><span>Inventaris</span></a></li>
										<li><a href="{{ site_url('admin/prestasi') }}"><span>Prestasi</span></a></li>
										<li><a href="{{ site_url('admin/ekstrakulikuler') }}"><span>Ekstrakulikuler</span></a></li>

									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Galeri</span></a>
									<ul>
										<li><a href="{{ site_url('admin/album-photo') }}">Album Foto</a></li>
										<li><a href="{{ site_url('admin/video') }}">Video</a></li>
									</ul>
								</li>
								<li><a href="{{ site_url('admin/image-slider') }}"><i class="icon-home4"></i> <span>Image Slider</span></a></li>
								<li><a href="{{ site_url('admin/hubungi-kami') }}"><i class="icon-home4"></i> <span>Hubungi Kami</span></a></li>
								<li><a href="{{ site_url('admin/quote') }}"><i class="icon-home4"></i> <span>Kata Bijak</span></a></li>
								<li><a href="{{ site_url('admin/pengaturan') }}"><i class="icon-home4"></i> <span>Pengaturan</span></a></li>

								
								

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
				@yield('content')
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	@yield('js')
</body>
</html>
