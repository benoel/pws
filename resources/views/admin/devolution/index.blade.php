@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.devolution.create') }}" class="btn btn-primary">Buat Transaksi Baru</a>
		</div>
		<div class="card-body">
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
							<a class="btn btn-primary" href="{{ route('admin.devolution.agreement', [$devolution->id ]) }}">Surat Peralihan</a>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection