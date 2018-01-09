@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center">
				<h3 class="h4">Kwitansi</h3>
			</div>
			<br>
			<table id="dataTables" class="table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nomor Kwitansi</th>
						<th>Jumlah Pembayaran</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					@php ($i=1)
					@foreach ($rentpayments as $rp)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $rp->receipt_number}}</td>
						<td>Rp {{ number_format($rp->payment_amount, 0 , '.', '.')}}</td>
						<td>{{ $rp->created_at->format('d M Y')}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
