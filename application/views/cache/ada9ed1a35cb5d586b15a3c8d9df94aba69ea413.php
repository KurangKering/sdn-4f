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
		<form class="form-horizontal"  action="#">

			<div class="col-md-8">
				<div class="panel panel-flat">
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
						<fieldset class="content-group">
							<input type="hidden" name="id" value="<?php echo e($query ? $query->id : ''); ?>">
							<div class="form-group">
								<div class="col-lg-12">
									<input type="text" name="post_title" id="post_title" placeholder="Judul Berita" value="<?php echo e($query ? $query->judul : ''); ?>" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<textarea rows="25" id="post_content" name="post_content" class="form-control ckeditor"><?php echo ($query ? $query->konten : ''); ?></textarea>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h6 class="panel-title">Kategori Berita</h6>

							</div>
							<div class="panel-body">
								<fieldset class="content-group">
									<div class="form-group">
										<?php
										$post_categories = $query->kategori_berita_id ?? [];
										$c = explode(',', $post_categories);


										foreach($data_kategori as $key => $kategori) {

											$checked = in_array($key, $c) ? 'checked' :'';
											
											echo '<div class="checkbox">' . PHP_EOL;
											echo '<label>';
											echo '<input type="checkbox"'.$checked.' class="checkbox" name="kategori_berita_id[]" value="'.$key.'">'.$kategori;
											echo '</label>';
											echo '</div>' .  PHP_EOL;
										}
										?>
									</div>
								</fieldset>
								
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="panel panel-white">
							<div class="panel-heading">
								<h6 class="panel-title">Gambar Cover</h6>

							</div>
							<div class="panel-body">
								<fieldset class="content-group">
									<div class="form-group">
										<input type="file" name="post_image" class="form-control" id="post_image">
										<img <?=(isset($post_image) && $post_image) ? ('src="'.$post_image.'"') : '' ?> id="preview" width="293px" style="margin-top: 50px; <?=(isset($post_image) && $post_image) ? '': 'display:none;'?>" class="img-responsive" title="Double klik untuk menghapus gambar">
									</div>
								</fieldset>
								<div class="text-right">
									<button type="button" onclick="submit_posts(); return false;"  class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>
<!-- /content area -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?= site_url('assets/plugins/tinymce/tinymce.min.js')  ?>"></script>
<script type="text/javascript">
	/** @namespace  tinimce */
	tinymce.init({
		selector: "#post_content",
		theme: 'silver',
		paste_data_images:true,
		relative_urls: false,
		remove_script_host: false,
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview forecolor backcolor emoticons",
		image_advtab: true,
		plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen",
		"insertdatetime nonbreaking save table contextmenu directionality",
		"emoticons template paste textcolor colorpicker textpattern"
		],
		automatic_uploads: true,
		file_picker_types: 'image',
		file_picker_callback: function(cb, value, meta) {
			var input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'image/*');
			input.onchange = function() {
				var file = this.files[0];
				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					var id = 'berita-image-' + (new Date()).getTime();
					var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
					var blobInfo = blobCache.create(id, file, reader.result);
					blobCache.add(blobInfo);
					cb(blobInfo.blobUri(), { title: file.name });
				};
			};
			input.click();
		},
		images_upload_handler: function (blobInfo, success, failure) {
			var xhr, formData;
			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', _BASE_URL + 'admin/berita/images_upload_handler');
			xhr.onload = function() {
				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}
				var res = _H.StrToObject( xhr.responseText );
				if (res.status == 'error') {
					failure( res.message );
					return;
				}
				success( res.location );
			};
			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());
			xhr.send(formData);
		}
	});
	function submit_posts() {

		var categories = $("input.checkbox:checked");
		var post_categories = [];
		categories.each( function() {
			post_categories.push( $(this).val() );
		});

		var fill_data = new FormData();
		fill_data.append('post_title', $('#post_title').val());
		fill_data.append('kategori_berita_id', post_categories.join(','));
		fill_data.append('post_content', tinyMCE.get('post_content').getContent());
		fill_data.append('post_image', $('input[type=file]')[ 0 ].files[ 0 ]);
		// send data
		$.ajax({
			url: '<?=$action;?>',
			type: 'POST',
			data: fill_data,
			contentType: false,
			processData: false,
			success : function( response ) {
				var res = _H.StrToObject( response );
				

				_H.Notify(res.status, _H.Message(res.message));

				location.href='<?php echo e(site_url('admin/berita')); ?>';

				if (res.action == 'save')  {
					$('#post_tags').importTags('');
					$('input[type="text"], input[type="file"]').val('');
					tinyMCE.get('post_content').setContent('');
					$('#post_title').focus();
					$('#preview').removeAttr('src').hide();
				}
				_H.Loading( false );
			}
		});

	}
	Preview = function(e) {
		if (e.files && e.files[0]) {
			var t = new FileReader;
			t.onload = function(e) {
				$("#preview").attr("src", e.target.result)
			}, t.readAsDataURL(e.files[0])
		} 
	}
	$(function() {
		/* Show Form Add New category */
		$('.add-new-category').on('click', function(e) {
			e.preventDefault();
			$('#category_name').val('');
			$('.category-form').modal('show');
		});
		// Image Preview
		$('#post_image').on('change', function() {
			$('#preview').show();
			Preview (this);
		});
		// remove Image Preview
		$('#preview').on('dblclick', function() {
			$('#preview').hide().removeAttr('src');
		});
		/* Tags */
		// $('#post_tags').tagsInput({
		// 	'width': 'auto',
		// 	'autocomplete_url': _BASE_URL + 'blog/tags/autocomplete',
		// 	'interactive':true,
		// 	'defaultText':'Add New',
		//    'delimiter': [', '],   // Or a string with a single delimiter. Ex: ';'
		//    'removeWithBackspace' : true,
		//    'minChars' : 0,
		//    'maxChars' : 0, // if not provided there is no limit
		//    'placeholderColor' : '#666666'
		// });
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>