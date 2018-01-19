@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center">
				<h3 class="h4">Peralihan</h3>
			</div>
			<br>
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No. Transaksi</th>
						<th>Keterangan</th>
						<th>Biaya</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($devolutions as $devolution)
					<tr>
						<td>{{ $devolution->transaction_number }}</td>
						<td>Dari {{ $devolution->fromUser->name }} ke {{ $devolution->toUser->name }}</td>
						<td>Rp. {{ number_format($devolution->cost, 0, '.', '.') }}</td>
						<td>
							<a class="btn btn-primary" href="{{ route('tenant.devolution.agreement', [$devolution->id ]) }}">Surat Peralihan</a>
							<a class="btn btn-primary" href="{{ route('tenant.devolution.receipt', [$devolution->id ]) }}">Kwitansi</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
