@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.rent.create') }}" class="btn btn-primary">Buat Transaksi Baru</a>
		</div>
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No. Invoice</th>
						<th>Nomor Unit</th>
						<th>Penyewa</th>
						<th>Lama Sewa</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($rents as $rent)
					<tr>
						<td>{{ $rent->invoice_number }}</td>
						<td>{{ $rent->unit->unit_identity }}</td>
						<td>{{ $rent->user->name }}</td>
						<td>{{ $rent->rent_length }} Bulan</td>
						<td>{{ $rent->status }}</td>
						<td>
							<a href="{{ route('admin.rent.show', [$rent->id]) }}" class="btn btn-primary">Lihat</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection