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

			<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ site_url('admin/album-photo/save') }}">
				<fieldset class="content-group">
					<input type="hidden" name="id" value="{{ $data ? $data->id : '' }}">
					<div class="form-group">
						<label class="control-label col-lg-2">Judul</label>
						<div class="col-lg-10">
							<input required type="text" name="title" value="{{ $data ? $data->title : '' }}" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Deskripsi</label>
						<div class="col-lg-10">
							<textarea required name="description" class="form-control">{{ $data ? $data->description : '' }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Cover</label>
						<div class="col-lg-10">
							<input  type="file" name="post_image" class="form-control" id="post_image">
							<img <?=(isset($post_image) && $post_image) ? ('src="'.$post_image.'"') : '' ?> id="preview" width="293px" style="margin-top: 50px; <?=(isset($post_image) && $post_image) ? '': 'display:none;'?>" class="img-responsive" title="Double klik untuk menghapus gambar">
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
<script>
	Preview = function(e) {
		if (e.files && e.files[0]) {
			var t = new FileReader;
			t.onload = function(e) {
				$("#preview").attr("src", e.target.result)
			}, t.readAsDataURL(e.files[0])
		} 
	}

	// Image Preview
	$('#post_image').on('change', function() {
		$('#preview').show();
		Preview (this);
	});
		// remove Image Preview
		$('#preview').on('dblclick', function() {
			$('#preview').hide().removeAttr('src');
			$('#post_image').val('');
		});
	</script>
	@endsection