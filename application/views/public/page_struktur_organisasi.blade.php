@extends('layouts.frontend')

@section('content')
<!-- TULISAN POPULER -->
{{-- <h5 class="page-title mb-3">Berita Terbaru</h5> --}}

<div class="card rounded-0 border border-secondary mb-3">
	<div class="card-body">
		<h4 class="card-title">Data Struktur Organisasi</h4>
		
		
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
				@php $num = 1; @endphp
				@foreach ($dataStrukturOrganisasi as $data)
				<tr>
					<td>{{ $num++ }}</td>
					<td>{{ $data->nama }}</td>
					<td>{{ $data->jabatan }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<small class="text-muted float-right">{{ $visi_misi->created_at }} - {{ 'Admin' }}</small>
	</div>
</div>
@endsection