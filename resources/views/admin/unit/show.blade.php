@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center">
				<h3 class="h4">Detail Info</h3>
			</div>
			<table class="table">
				<tr>
					<td>Nomor Unit</td>
					<td>: {{ $unit->unit_identity }}</td>
				</tr>
				<tr>
					<td>Nomor VA</td>
					<td>: {{ $unit->va_number }}</td>
				</tr>
				<tr>
					<td>Luas</td>
					<td>: {{ $unit->capacious }} m<sup>2</sup></td>
				</tr>
				<tr>
					<td>Lantai</td>
					<td>: {{ $unit->floor->name }}</td>
				</tr>
				<tr>
					<td>Blok</td>
					<td>: {{ $unit->type->name }}</td>
				</tr>
				<tr>
					<td>Harga/Bulan</td>
					<td>: Rp. {{ number_format($unit->cost, 0, '.', '.') }}</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center" style="margin-bottom: 10px;">
				<h3 class="h4">Disewa oleh</h3>
			</div>
			<table class="table" id="dataTables">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama penyewa</th>
						<th>Bidang usaha</th>
						<th>Tgl Sewa</th>
						<th>Akhir Sewa</th>
						<th>Status</th>
						<th>Pembayaran</th>
					</tr>
				</thead>
				<tbody>
					@php ($i=1)
					@foreach ($unit->rents as $rent)
					<tr>
						<td>{{ $i++ }}</td>
						<td><a href="{{ route('admin.tenant.show', $rent->user->id) }}">{{ $rent->user->name }}</a></td>
						<td>{{ $rent->user->business_field->name }}</td>
						<td>{{ $rent->created_at->format('d M Y') }}</td>
						<td>{{ $rent->end_rent }}</td>
						<td>{{ $rent->user->isActive() ? 'Aktif' : 'Blok' }}</td>
						<td>{{ $rent->status }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection