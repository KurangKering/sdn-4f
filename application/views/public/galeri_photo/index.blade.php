@extends('layouts.frontend')

@section('content')


<h5 class="page-title mb-3">Galeri Foto</h5>
<div class="row">
	@foreach ($albums as $album)
	<div class="col-md-4 mb-4 albums">
		<div class="card h-100 shadow border border-secondary rounded-0">
			<img src="{{ $album->cover ? site_url('media/album/large/'.$album->cover) : '' }}" class="card-img-top rounded-0">
			<div class="card-body pb-2">
				<h5 class="card-title">{{ $album->title }}</h5>
				<p class="card-text text-justify">{{ $album->description }}</p>
			</div>
			<div class="card-footer">
				<button type="button" onclick="photo_preview2({{ $album->id }})" class="btn action-button rounded-0 float-right"><i class="fa fa-search"></i></button>
			</div>
		</div>
	</div>
	@endforeach
</div>



@endsection

@section('js')
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
@endsection