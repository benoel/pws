@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.unit.create') }}" class="btn btn-primary">Buat Unit Baru</a>
		</div>
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nomor Unit</th>
						<th>VA Number</th>
						<th>Lantai</th>
						<th>Blok</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($units as $unit)
					<tr>
						<td width="25">{{ $i++ }}</td>
						<td>{{ $unit->unit_identity }}</td>
						<td>{{ $unit->va_number }}</td>
						<td>{{ $unit->floor->name }}</td>
						<td>{{ $unit->block->name }}</td>
						<td>
							<a href="{{ route('admin.unit.edit', [$unit->id]) }}" class="btn btn-primary">Edit</a>
							<a href="{{ route('admin.unit.show', [$unit->id]) }}" class="btn btn-primary">Detail</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection