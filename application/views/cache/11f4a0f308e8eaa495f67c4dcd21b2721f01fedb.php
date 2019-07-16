
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend-2/assets/css/icons/icomoon/styles.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend-2/assets/css/bootstrap.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend-2/assets/css/core.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend-2/assets/css/components.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend-2/assets/css/colors.css')  ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<?php echo $__env->yieldContent('css'); ?>

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url('assets/template/backend-2/assets/js/plugins/loaders/pace.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend-2/assets/js/core/libraries/jquery.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend-2/assets/js/core/libraries/bootstrap.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend-2/assets/js/plugins/loaders/blockui.min.js')  ?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->

	<script type="text/javascript" src="<?= base_url('assets/template/backend-2/assets/js/core/app.js')  ?>"></script>
	<?php echo $__env->yieldContent('js'); ?>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="<?= base_url('assets/template/backend-2/assets/images/logo_light.png')  ?>" alt=""></a>

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
					
					<li><a href="#"><i class="icon-switch2"></i> Logout</a></li>

					

					
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
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?= base_url('assets/template/backend-2/assets/images/placeholder.jpg')  ?>" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
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
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">\<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Page layouts</span></a>
									<ul>
										<li><a href="layout_navbar_fixed.html">Fixed navbar</a></li>
										<li><a href="layout_navbar_sidebar_fixed.html">Fixed navbar &amp; sidebar</a></li>
										<li><a href="layout_sidebar_fixed_native.html">Fixed sidebar native scroll</a></li>
										<li><a href="layout_navbar_hideable.html">Hideable navbar</a></li>
										<li><a href="layout_navbar_hideable_sidebar.html">Hideable &amp; fixed sidebar</a></li>
										<li><a href="layout_footer_fixed.html">Fixed footer</a></li>
										<li class="navigation-divider"></li>
										<li><a href="boxed_default.html">Boxed with default sidebar</a></li>
										<li><a href="boxed_mini.html">Boxed with mini sidebar</a></li>
										<li><a href="boxed_full.html">Boxed full width</a></li>
									</ul>
								</li></ul>
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

	</body>
	</html>
