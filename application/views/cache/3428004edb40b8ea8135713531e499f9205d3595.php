<?php $__env->startSection('content'); ?>

<div class="card rounded-0 border border-secondary mb-3">
	<img src="<?php echo e(site_url('media/berita/large/'.$berita->berita_image)); ?>" class="card-img-top rounded-0 w-100">
	<div class="card-body">
		<h4 class="card-title"><?php echo e($berita->judul); ?></h4>
		<p class="card-text">
			<?php echo $berita->konten; ?>


		</p>
	</div>
	<div class="card-footer">
		<small class="text-muted float-right"><?php echo e($berita->created_at); ?> - <?php echo e($berita->author_user_id); ?></small>
	</div>
</div>

<!--  Komentar-->
<h5 class="page-title mt-3 mb-3">Komentar</h5>
<?php $__currentLoopData = $berita->komentar_berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komentar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card rounded-0 border border-secondary mb-3 post-comments">
	<div class="card-body">
		<p class="card-text"><?php echo e($komentar->komentar); ?></p>
	</div>
	<div class="card-footer">
		<small class="text-muted float-right"><?php echo e($komentar->created_at); ?> - <?php echo e($komentar->nama); ?></small>
	</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<!-- Form Comment -->
<h5 class="page-title mt-3 mb-3">Komentari Tulisan Ini</h5>
<div class="card rounded-0 border border-secondary mb-3">
	<form method="POST" action="<?php echo e(site_url('berita/post_komen')); ?>">
		
		<div class="card-body">
			<div class="form-group row mb-2">
				<label for="nama" class="col-sm-3 control-label">Nama Lengkap <span style="color: red">*</span></label>
				<div class="col-sm-9">
					<input type="text" required class="form-control form-control-sm rounded-0 border border-secondary" id="nama" name="nama">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label for="email" class="col-sm-3 control-label">Email <span style="color: red">*</span></label>
				<div class="col-sm-9">
					<input type="email" required class="form-control form-control-sm rounded-0 border border-secondary" id="email" name="email">
				</div>
			</div>

			<div class="form-group row mb-2">
				<label for="komentar" class="col-sm-3 control-label">Komentar <span style="color: red">*</span></label>
				<div class="col-sm-9">
					<textarea name="komentar" required class="form-control form-control-sm rounded-0 border border-secondary" id="komentar" rows="4"></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<div class="form-group row mb-0">
				<div class="offset-sm-3 col-sm-9">
					<input type="hidden" name="berita_id" id="berita_id" value="<?php echo e($berita->id); ?>">
					<input type="hidden" name="current_url" id="current_url" value="<?php echo e(current_url()); ?>">
					<button type="submit"  class="btn action-button rounded-0"><i class="fa fa-send"></i> Submit</button>
				</div>
			</div>
		</div>

	</form>
</div>

<!-- Get Anther Posts -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>