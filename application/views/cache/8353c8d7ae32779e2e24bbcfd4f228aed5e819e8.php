
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


	<?php echo $__env->yieldContent('css'); ?>

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
					
					<li><a href="<?php echo e(site_url('auth/do_logout')); ?>"><i class="icon-switch2"></i> Logout</a></li>

					

					
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
					
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion"><!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="<?php echo e(site_url('admin/dashboard')); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li><a href="<?php echo e(site_url('admin/pengguna')); ?>"><i class="icon-home4"></i> <span>Data Pengguna</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Posts</span></a>
									<ul>
										<li><a href="<?php echo e(site_url('admin/kategori_berita')); ?>">Kategori Berita</a></li>
										<li><a href="<?php echo e(site_url('admin/berita')); ?>">Berita</a></li>
										<li><a href="#">Agenda</a></li>
									</ul>
								</li>
									<li>
									<a href="#"><i class="icon-stack2"></i> <span>Pages</span></a>
									<ul>
										<li><a href="<?php echo e(site_url('admin/pages/profil')); ?>">Profil</a></li>
										<li><a href="<?php echo e(site_url('admin/pages/visi_misi')); ?>">Visi Misi</a></li>
										<li><a href="<?php echo e(site_url('admin/pages/sambutan')); ?>">Sambutan Kepala Sekolah</a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Galeri</span></a>
									<ul>
										<li><a href="<?php echo e(site_url('admin/album-photo')); ?>">Album Foto</a></li>
										<li><a href="<?php echo e(site_url('admin/pages/visi_misi')); ?>">Video</a></li>
									</ul>
								</li>
								<li><a href="<?php echo e(site_url('admin/image-slider')); ?>"><i class="icon-home4"></i> <span>Image Slider</span></a></li>
								<li><a href="<?php echo e(site_url('admin/hubungi-kami')); ?>"><i class="icon-home4"></i> <span>Hubungi Kami</span></a></li>
								<li><a href="<?php echo e(site_url('admin/quote')); ?>"><i class="icon-home4"></i> <span>Kata Bijak</span></a></li>
								<li><a href="<?php echo e(site_url('admin/pengaturan')); ?>"><i class="icon-home4"></i> <span>Pengaturan</span></a></li>

								
								

								</ul>
							</div>
						</div>
						<!-- /main navigation -->

					</div>
				</div>
				<!-- /main sidebar -->


				<!-- Main content -->
				<div class="content-wrapper">
					<?php echo $__env->yieldContent('content'); ?>
				</div>
				<!-- /main content -->

			</div>
			<!-- /page content -->

		</div>
		<!-- /page container -->

	<?php echo $__env->yieldContent('js'); ?>
	</body>
	</html>
