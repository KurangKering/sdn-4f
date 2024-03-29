
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page </title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/icons/icomoon/styles.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/bootstrap.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/core.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/components.css')  ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/template/backend/assets/css/colors.css')  ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/plugins/loaders/pace.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/core/libraries/jquery.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/core/libraries/bootstrap.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/plugins/loaders/blockui.min.js')  ?>"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url('assets/template/backend/assets/js/core/app.js')  ?>"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Main navbar -->
	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form action="{{ site_url('auth/do_login_admin') }}" method="POST">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account </h5>
							</div>

							@if (isset($_SESSION['errors']))
							<div class="alert alert-warning alert-styled-left">
							
								{{ $_SESSION['errors'] }} 
							</div>
							
							@endif

							<div class="form-group has-feedback has-feedback-left">
								<input required type="text" name="username" class="form-control" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input required type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit"  class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							{{-- <div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div> --}}
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
