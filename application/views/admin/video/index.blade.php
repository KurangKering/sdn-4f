@extends('layouts.backend')
@section('css')

@endsection

@section('content')


<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> Data Video</h4>
		</div>

		<div class="heading-elements">
			<div class="heading-btn-group">
				<a href="{{ site_url('admin/video/create') }}" class="btn btn-link btn-float has-text"><i class="icon-add text-primary"></i><span>Tambah Video</span></a>

			</div>
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

		

		<table class="table datatable-basic table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>Caption</th>
					<th>Video</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($daftar_video as $video)
				@php
				$url = $video->url ? '<img src="'.site_url('media/photo/thumbnail/'.$video->url).'" alt="">' : '';
				@endphp
				<tr>
					<td style="vertical-align: top">{{ $video->caption }}</td>
					<td style="width: 40%;">
						<video  style="max-width: 100%;" class='video-js vjs-big-play-centered' controls preload='metadata' data-setup='{"fluid": true}'>
							<source src='{{ site_url('media/videos/'.$video->url .'#t=0.1') }}' type='video/mp4'>
								<p class='vjs-no-js'>
									To view this video please enable JavaScript, and consider upgrading to a web browser that
									<a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
								</p>
							</video>
						</td>

						<td width="1%" style="white-space: nowrap;">
							<a href="{{ site_url('admin/video/edit/'.$video->id) }}" class="btn btn-success">Edit</a>
							<form action="{{ site_url('admin/video/delete') }}" method="POST" style="display: inline">
								<input type="hidden" name="id" value="{{ $video->id }}">
								<button type="submit" class="btn btn-danger">Hapus</button>
							</form>


						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
	<!-- /content area -->
	@endsection

	@section('js')
	<script type="text/javascript" src="{{ site_url('assets/template/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ site_url('assets/template/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>

	<script>
	/* ------------------------------------------------------------------------------
*
*  # Basic datatables
*
*  Specific JS code additions for datatable_basic.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
    	autoWidth: false,
    	columnDefs: [],
    	dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    	language: {
    		search: '<span>Filter:</span> _INPUT_',
    		searchPlaceholder: 'Type to filter...',
    		lengthMenu: '<span>Show:</span> _MENU_',
    		paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
    	},
    	drawCallback: function () {
    		$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    	},
    	preDrawCallback: function() {
    		$(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    	}
    });


    // Basic datatable
    $('.datatable-basic').DataTable();


    // Alternative pagination
    $('.datatable-pagination').DataTable({
    	pagingType: "simple",
    	language: {
    		paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
    	}
    });


    // Datatable with saving state
    $('.datatable-save-state').DataTable({
    	stateSave: true
    });


    // Scrollable datatable
    $('.datatable-scroll-y').DataTable({
    	autoWidth: true,
    	scrollY: 300
    });



    // External table additions
    // ------------------------------

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
    	minimumResultsForSearch: Infinity,
    	width: 'auto'
    });
    
});
</script>
@endsection