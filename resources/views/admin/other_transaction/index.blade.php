@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.other_transaction.create') }}" class="btn btn-primary">Buat Transaksi Baru</a>
		</div>
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No. Transaksi</th>
						<th>Unit</th>
						<th>Keterangan</th>
						<th>Biaya</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($other_transactions as $ot)
					<tr>
						<td width="25">{{ $i++ }}</td>
						<td>{{ $ot->unit->unit_identity }}</td>
						<td>{{ $ot->note }}</td>
						<td>Rp. {{ number_format($ot->cost, 0, '.', '.') }}</td>
						<td>
							@if (Auth::user()->role == 2)
							<form class="form-aksi" action="{{ route('admin.other_transaction.destroy', [$ot->id]) }}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="delete">
								<button type="submit" class="btn btn-primary">Hapus</button>
							</form>
							@endif
							<a href="{{ route('admin.other_transaction.receipt', [$ot->id]) }}" class="btn btn-primary">Lihat</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection