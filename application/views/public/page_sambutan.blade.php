@extends('layouts.frontend')

@section('content')
<!-- TULISAN POPULER -->
{{-- <h5 class="page-title mb-3">Berita Terbaru</h5> --}}

<div class="card rounded-0 border border-secondary mb-3">
	<div class="card-body">
		<h4 class="card-title">Sambutan Kepala Sekolah</h4>
		<p class="card-text">
			
			{!! $sambutan->isi !!}
		</p>
	</div>
	<div class="card-footer">
		<small class="text-muted float-right">{{ $visi_misi->created_at }} - {{ 'Admin' }}</small>
	</div>
</div>
@endsection

