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
		
			<?php

			?>
			<form class="form-horizontal"  method="POST" action="<?php echo e(site_url('admin/struktur_organisasi/save')); ?>">
				<fieldset class="content-group">
					<input type="hidden" name="id" value="<?php echo e($query ? $query->id : ''); ?>">
					<div class="form-group">
						<label class="control-label col-lg-2">Nama</label>
						<div class="col-lg-10">
							<input type="text" name="nama" value="<?php echo e($query ? $query->nama : ''); ?>" class="form-control">
						</div>
					</div><div class="form-group">
						<label class="control-label col-lg-2">Jabatan</label>
						<div class="col-lg-10">
							<input type="text" name="jabatan" value="<?php echo e($query ? $query->jabatan : ''); ?>" class="form-control">
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
	</div>

</div>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>