@extends('layouts.backend')
@section('css')

@endsection

@section('content')


<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> {{ $title }}</h4>
		</div>

		<div class="heading-elements">
			
		</div>
	</div>


</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"></h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

		

		<div class="panel-body">
			@if ($_SESSION['validation_errors'])
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($_SESSION['validation_errors'] as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form class="form-horizontal"  method="POST" action="{{ site_url('admin/pengguna/save') }}">
				<fieldset class="content-group">
					<input type="hidden" name="id" value="{{ $data ? $data->id : '' }}">
					<div class="form-group">
						<label class="control-label col-lg-2">Username</label>
						<div class="col-lg-10">
							<input type="text" name="username" value="{{ $data ? $data->username : '' }}" class="form-control">
						</div>
					</div><div class="form-group">
						<label class="control-label col-lg-2">Nama</label>
						<div class="col-lg-10">
							<input type="text" name="nama" value="{{ $data ? $data->nama : '' }}" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Email</label>
						<div class="col-lg-10">
							<input type="text" name="email" value="{{ $data ? $data->email : '' }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-2">Password</label>
						<div class="col-lg-10">
							<input type="password" name="password"  class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-2">Confirm Password</label>
						<div class="col-lg-10">
							<input type="text" name="confirm_password" class="form-control">
						</div>
					</div>




					<div class="form-group">
						<label class="control-label col-lg-2">Hak Akses</label>
						<div class="col-lg-10">
							<select name="role" class="form-control">
								@foreach (_enumRoles() as $key => $role)

								<option value="{{ $key }}" {{ $key == $data->role ? 'selected' : '' }} >{{ $role }}</option>
								@endforeach

								
							</select>
						</div>
					</div>

					

					

					

					

					
				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- /content area -->
@endsection

@section('js')

@endsection