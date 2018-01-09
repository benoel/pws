@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center">
				<h3 class="h4">Invoice</h3>
			</div>
			<br>
			<table id="dataTables" class="table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nomor Invoice</th>
						<th>Jumlah Tagihan</th>
						<th>Status</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i=1)
					@foreach ($user->rents as $rent)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $rent->invoice_number}}</td>
						<td>Rp {{ number_format($rent->grand_total, 0, '.', '.') }}</td>
						<td>{{ $rent->status }}</td>
						<td>{{ $rent->created_at->format('d M Y')}}</td>
						<td>
							<a href="{{ route('tenant.receipt', [$rent->id]) }}">Detail Kwitansi</a> || <a href="{{ route('tenant.agreement', [$rent->id]) }}">Surat Perjanjian</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
