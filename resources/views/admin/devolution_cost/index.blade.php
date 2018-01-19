@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		@if ($devolution_costs->count() < 1)
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.devolution_cost.create') }}" class="btn btn-primary">Buat Biaya Servis</a>
		</div>
		@endif
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Biaya Peralihan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($devolution_costs as $dc)
					<tr>
						<td width="25">{{ $i++ }}</td>
						<td>Rp. {{ number_format($dc->cost, 0, '.', '.') }}</td>
						<td>
							@if (Auth::user()->role == 2)
							<a href="{{ route('admin.devolution_cost.edit', [$dc->id]) }}" class="btn btn-primary">Edit</a>
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