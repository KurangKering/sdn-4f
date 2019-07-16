<?php $__env->startSection('content'); ?>
<!-- TULISAN POPULER -->


<div class="card rounded-0 border border-secondary mb-3">
	<div class="card-body">
		<h4 class="card-title">Sambutan Kepala Sekolah</h4>
		<p class="card-text">
			
			<?php echo $sambutan->isi; ?>

		</p>
	</div>
	<div class="card-footer">
		<small class="text-muted float-right"><?php echo e($visi_misi->created_at); ?> - <?php echo e('Admin'); ?></small>
	</div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>