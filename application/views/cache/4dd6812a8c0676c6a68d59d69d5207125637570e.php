<?php $__env->startSection('css'); ?>

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

			<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo e(site_url('admin/photo/save')); ?>">
				<fieldset class="content-group">
					<input type="hidden" name="album_photo_id" value="<?php echo e($album_id ? $album_id : ''); ?>">
					<div class="form-group">
						<label class="control-label col-lg-2">Album ID</label>
						<div class="col-lg-10">
							<input required type="text" name="" readonly value="<?php echo e($album_id); ?>" class="form-control">
						</div>
					</div>
					<?php if($photo_id): ?>
					<div class="form-group">
						<label class="control-label col-lg-2">Photo ID</label>
						<div class="col-lg-10">
							<input required type="text" name="id" readonly value="<?php echo e($photo_id); ?>" class="form-control">
						</div>
					</div>
					<?php endif; ?>
					<div class="form-group">
						<label class="control-label col-lg-2">Caption</label>
						<div class="col-lg-10">
							<textarea required name="caption" class="form-control"><?php echo e($photo ? $photo->caption : ''); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-2">Gambar</label>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>