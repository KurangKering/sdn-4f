<?php $__env->startSection('content'); ?>
<!-- TULISAN POPULER -->


<div class="card rounded-0 border border-secondary mb-3">
	<div class="card-body">
		<h4 class="card-title">Data Guru & Pegawai</h4>
		
		
	</div>
	<div class="card-body">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Jabatan</th>
				</tr>
			</thead>
			<tbody>
				<?php $num = 1; ?>
				<?php $__currentLoopData = $dataGuruPegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($num++); ?></td>
					<td><?php echo e($data->nama); ?></td>
					<td><?php echo e($data->jabatan); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<small class="text-muted float-right"><?php echo e($visi_misi->created_at); ?> - <?php echo e('Admin'); ?></small>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>