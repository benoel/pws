@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center">
				<div class="card-close" style="margin: 10px 10px 0 0;">
					<a class="btn btn-primary" href="{{ route('tenant.edit', [$tenant->id ]) }}">Ubah Profile</a>
					<a class="btn btn-primary" href="{{ route('tenant.password.edit', [$tenant->id ]) }}">Ganti Password</a>
				</div>
				<h3 class="h4">Detail Info</h3>
			</div>
			<table class="table">
				<tr>
					<td>Nama</td>
					<td>: {{ $tenant->name }}</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: {{ $tenant->address }}</td>
				</tr>
				<tr>
					<td>No. Telp/HP</td>
					<td>: {{ $tenant->phone_number }}</td>
				</tr>
				<tr>
					<td>No. Identitas</td>
					<td>: {{ $tenant->identity_card_number }}</td>
				</tr>
				<tr>
					<td>npwp</td>
					<td>: {{ $tenant->npwp }}</td>
				</tr>
				<tr>
					<td>Perusahaan</td>
					<td>: {{ $tenant->company != '' ? $tenant->company : '-' }}</td>
				</tr>
				<tr>
					<td>Jenis Usaha</td>
					<td>: {{ $tenant->business_field->name }}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>: {{ $tenant->isActive() ? 'Aktif' : 'Blok' }}</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center">
				<h3 class="h4">Sewa</h3>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Unit</th>
						<th>Lantai</th>
						<th>Blok</th>
						<th>Luas</th>
						<th>Lama Sewa</th>
						<th>Akhir Sewa</th>
					</tr>
				</thead>
				<tbody>
					@php ($i=1)
					@foreach ($tenant->rents as $rent)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $rent->unit->unit_identity }}</td>
						<td>{{ $rent->unit->floor->name }}</td>
						<td>{{ $rent->unit->block->name }}</td>
						<td>{{ $rent->unit->capacious }} m<sup>2</sup></td>
						<td>{{ $rent->rent_length }} Bulan</td>
						<td>{{ $rent->end_rent }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
