<?php $__env->startSection('css'); ?>
<style>


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <?php echo e($title); ?></h4>
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
					<?php if($_SESSION['validation_errors']): ?>
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							<?php $__currentLoopData = $_SESSION['validation_errors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<?php endif; ?>



					<form class="form-horizontal" id="frmVideo">

						<input type="hidden" name="video_id" value="<?php echo e($video->id); ?>">
						<div class="form-group">
							<label class="control-label col-lg-2">Caption</label>
							<div class="col-lg-10">
								<textarea required name="caption" class="form-control"><?php echo e($video ? $video->caption : ''); ?></textarea>
							</div>
						</div>

						
						<div class="form-group">
							<label class="control-label col-lg-2">Video Lama</label>
							<div class="col-lg-10">
								<div style="width: 100%">
									<video  class='video-js vjs-big-play-centered' controls preload='metadata' data-setup='{"fluid": true}'>
										<source src='<?php echo e(site_url('media/videos/'.$video->url .'#t=0.1')); ?>' type='video/mp4'>
											<p class='vjs-no-js'>
												To view this video please enable JavaScript, and consider upgrading to a web browser that
												<a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
											</p>
										</video>
									</div>


								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-lg-2">File Video Baru</label>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>
	
	indexOption = 'dropzonevideo';

	Dropzone.autoDiscover = false;
	$("div#dropzonevideo").dropzone({
		url : '<?php echo e(site_url('admin/video/update')); ?>',
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
            	if (myDropzone.files.length) {
            		myDropzone.processQueue();
            	} else {
            		var form_data = $("#frmVideo").serializeArray();

            		$.ajax({
            			url: '<?php echo e(site_url('admin/video/update')); ?>',
            			type: 'POST',
            			dataType: 'json',
            			data: form_data,
            		})
            		.done(function(resp) {
            			console.log(resp);
            			console.log("success");

            			if (resp.status == 'success') {
            				location.href= '<?php echo e(site_url('admin/video')); ?>';
            			}
            		})
            		.fail(function() {
            			console.log("error");
            		})
            		.always(function() {
            			console.log("complete");
            		});
            		
            	}
            	
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
            		location.href = '<?php echo e(site_url('admin/video')); ?>';
            	}
            });



        }
    });


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>