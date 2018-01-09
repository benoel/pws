@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.floor.create') }}" class="btn btn-primary">Buat Lantai</a>
		</div>
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Lantai</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($floors as $floor)
					<tr>
						<td width="25">{{ $i++ }}</td>
						<td>{{ $floor->name }}</td>
						<td>
							<a href="{{ route('admin.floor.edit', [$floor->id]) }}" class="btn btn-primary">Edit</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection