@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.business_field.create') }}" class="btn btn-primary">Buat Jenis Usaha</a>
		</div>
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Jenis Usaha</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($business_fields as $bf)
					<tr>
						<td width="25">{{ $i++ }}</td>
						<td>{{ $bf->name }}</td>
						<td>
							<a href="{{ route('admin.business_field.edit', [$bf->id]) }}" class="btn btn-primary">Edit</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection