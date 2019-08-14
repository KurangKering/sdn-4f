<?php $__env->startSection('css-link'); ?>
<link href="<?php echo e(site_url('assets/plugins/video.js/dist/video-js.min.css')); ?>" rel="stylesheet" type="text/css" />

<style>
	.video-js {
		position: relative !important;
		width: 100% !important;
		height: auto !important;
	}
	vjs-poster {
		position: absolute !important;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<h5 class="page-title mb-3">Galeri Video</h5>
<div class="row">
	<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="col-md-12 mb-4 albums">
		<div class="card h-100 shadow border border-secondary rounded-0">
			<div class="card-body pb-2">
				<h5 class="card-title"><?php echo e($video->caption); ?></h5>
				
				<video  class='video-js vjs-big-play-centered' controls preload='metadata' data-setup='{"fluid": true}'>
					<source src='<?php echo e(site_url('media/videos/'.$video->url .'#t=0.1')); ?>' type='video/mp4'>
						<p class='vjs-no-js'>
							To view this video please enable JavaScript, and consider upgrading to a web browser that
							<a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
						</p>
					</video>

				</div>
				<div class="card-footer">
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>



	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
	<script src="<?php echo e(site_url('assets/plugins/video.js/dist/video.min.js')); ?>"></script>

	<script>

		function photo_preview2(e) {
			_H.Loading(!0), $.post(_BASE_URL + "galeri-photo/preview", {
				id: e
			}, function(e) {
				console.log(e);
				_H.Loading(!1), 0 < e.count ? $.magnificPopup.open({
					items: e.items,
					gallery: {
						enabled: !0
					},
					type: "image"
				}) : _H.Notify("info", "Photo tidak ditemukan !")
			})
		}
	</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>