<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> Dashboard</h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">

			</div>
		</div>
	</div>


</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
	<div class="row">
		<div class="col-lg-4">

			<!-- Members online -->
			<div class="panel bg-teal-400">
				<div class="panel-body">


					<h3 class="no-margin"><?php echo e($count['berita']); ?></h3>
					Postingan Berita
					
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
			<!-- /members online -->

		</div>
		<div class="col-lg-4">

			<!-- Members online -->
			<div class="panel bg-pink-400">
				<div class="panel-body">


					<h3 class="no-margin"><?php echo e($count['foto']); ?></h3>

					Galeri Foto
					
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
			<!-- /members online -->

		</div>
		<div class="col-lg-4">

			<!-- Members online -->
			<div class="panel bg-blue-400">
				<div class="panel-body">


					<h3 class="no-margin"><?php echo e($count['hubungi_kami']); ?></h3>
					Hubungi Kami
					
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
			<!-- /members online -->

		</div>



		
	</div>

</div>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
	$(function() {
		
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>