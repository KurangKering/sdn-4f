@extends('layouts.frontend')

@section('content')
<!-- TULISAN POPULER -->
<h5 class="page-title mb-3">Berita Terbaru</h5>
@foreach ($daftar_berita as $berita)

<div class="card rounded-0 border border-secondary mb-3">
	<div class="row no-gutters">
		<div class="col-md-5">
			<img src="{{ site_url('media/berita/medium/'.$berita->berita_image) }}" class="card-img rounded-0">
		</div>
		<div class="col-md-7">
			<div class="card-body p-3">
				<h5 class="card-title">
					<a href="{{ site_url('berita/read/'.$berita->id) }}">{{ $berita->judul }}
					</a></h5>
					@php
					$ori = $berita->konten;
					$content = preg_replace("/<img[^>]+\>/i", " ", $ori); 
					$content = substr($content, 0, 200);
					@endphp
					<p class="card-text mb-0">{!! $content !!}</p>
					<div class="d-flex justify-content-between align-items-center mt-1">
						<small class="text-muted">{{ $berita->created_at }} - {{ $berita->author_user_id }}</small>
						<a href="{{ site_url('berita/read/'.$berita->id) }}" class="btn btn-sm action-button rounded-0"><i class="fa fa-search"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endsection