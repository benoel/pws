@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		@if ($service_charges->count() < 1)
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.service_charge.create') }}" class="btn btn-primary">Buat Biaya Servis</a>
		</div>
		@endif
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Biaya Servis</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($service_charges as $sc)
					<tr>
						<td width="25">{{ $i++ }}</td>
						<td>Rp. {{ number_format($sc->cost, 0, '.', '.') }}</td>
						<td>
							@if (Auth::user()->role == 2)
							<a href="{{ route('admin.service_charge.edit', [$sc->id]) }}" class="btn btn-primary">Edit</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection