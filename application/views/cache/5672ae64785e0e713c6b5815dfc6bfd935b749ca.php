<?php $__env->startSection('content'); ?>
<h5 class="page-title mb-3">Hubungi Kami</h5>
<div id="map" class="w-100 border border-secondary"></div>
<div class="card rounded-0 border border-secondary mb-3">
	<form action="<?php echo e(site_url('pages/hubungi-kami/save')); ?>" method="POST">
		
		<div class="card-body">
			<div class="form-group row mb-2">
				<label for="nama" class="col-sm-3 control-label">Nama Lengkap <span style="color: red">*</span></label>
				<div class="col-sm-9">
					<input type="text" class="form-control form-control-sm rounded-0 border border-secondary" id="nama" name="nama">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label for="email" class="col-sm-3 control-label">Email <span style="color: red">*</span></label>
				<div class="col-sm-9">
					<input type="text" class="form-control form-control-sm rounded-0 border border-secondary" id="email" name="email">
				</div>
			</div>

			<div class="form-group row mb-2">
				<label for="pesan" class="col-sm-3 control-label">Pesan <span style="color: red">*</span></label>
				<div class="col-sm-9">
					<textarea name="pesan" class="form-control form-control-sm rounded-0 border border-secondary" id="pesan" rows="4"></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<div class="form-group row mb-0">
				<div class="offset-sm-3 col-sm-9">
					<button type="submit"  class="btn action-button rounded-0"><i class="fa fa-send"></i> Submit</button>
				</div>
			</div>
		</div>

	</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>