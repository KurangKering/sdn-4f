@extends('layouts.backend')
@section('css')
<style>


</style>
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
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
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



					<form class="form-horizontal">

						
						<div class="form-group">
							<label class="control-label col-lg-2">Caption</label>
							<div class="col-lg-10">
								<textarea required name="caption" class="form-control">{{ $photo ? $photo->caption : '' }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-2">File Video</label>
							<div class="col-lg-10">
								<div class="dropzone dropzone-previews" id="dropzonevideo"></div>

							</form>

						</div>
					</div>






					<div class="text-right">
						<button type="submit" id="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

</div>
<!-- /content area -->
@endsection

@section('js')

<script>
	
	indexOption = 'dropzonevideo';

	Dropzone.autoDiscover = false;
	$("div#dropzonevideo").dropzone({
		url : '{{ site_url('admin/video/save') }}',
		maxFiles: 1,
		uploadMultiple : false,
		thumbnailWidth: null,
		thumbnailHeight: null,
		acceptedFiles: 'video/*',
		addRemoveLinks: true,

        autoProcessQueue: false, // this is important as you dont want form to be submitted unless you have clicked the submit button


        accept: function(file, done) {
        	done();
        },
        init: function() {
        	var myDropzone = this;
            //now we will submit the form when the button is clicked
            $("#submit").on('click',function(e) {
            	e.preventDefault();
               myDropzone.processQueue(); // this will submit your form to the specified action path
              // after this, your whole form will get submitted with all the inputs + your files and the php code will remain as usual 
        //REMEMBER you DON'T have to call ajax or anything by yourself, dropzone will take care of that
    }); 
            this.on("addedfile", function() {
            	if (this.files[1]!=null){
            		this.removeFile(this.files[0]);
            	}
            });
            this.on("sending", function(data, xhr, formData) {
            	var data = $('form').serializeArray();
            	$.each(data, function(key, el) {
            		formData.append(el.name, el.value);
            	});
            });
            this.on("thumbnail", function(file, dataUrl) {
            	$('.dz-image').last().find('img').attr({width: '100%', height: '100%'});
            });
            this.on("success", function(file, responseText) {
            	resp = responseText;
            	if (resp.status == 'success') {
            		location.href = '{{ site_url('admin/video') }}';
            	}
            });



        }
    });


</script>

@endsection