<?php $__env->startSection('content'); ?>
<?php
$CI =& get_instance();
?>
<!-- TULISAN POPULER -->
<h5 class="page-title mb-3">Daftar Berita</h5>
<?php $__currentLoopData = $daftar_berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="card rounded-0 border border-secondary mb-3">
	<div class="row no-gutters">
		<div class="col-md-5">
			<img src="<?php echo e(site_url('media/berita/medium/'.$berita->berita_image)); ?>" class="card-img rounded-0">
		</div>
		<div class="col-md-7">
			<div class="card-body p-3">
				<h5 class="card-title">
					<a href="<?php echo e(site_url('berita/read/'.$berita->id)); ?>"><?php echo e($berita->judul); ?>

					</a></h5>
					<?php
					$ori = $berita->konten;
					$content = preg_replace("/<img[^>]+\>/i", " ", $ori); 
					$content = substr($content, 0, 200);
					?>
					<p class="card-text mb-0"><?php echo $content; ?></p>
					<div class="d-flex justify-content-between align-items-center mt-1">
						<small class="text-muted"><?php echo e($berita->created_at); ?> - <?php echo e($berita->author_user_id); ?></small>
						<a href="<?php echo e(site_url('berita/read/'.$berita->id)); ?>" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	<?php echo $CI->pagination->create_links(); ?>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>