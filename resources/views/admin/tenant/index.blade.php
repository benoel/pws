@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.tenant.create') }}" class="btn btn-primary">Daftar Penyewa</a>
		</div>
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($tenants as $tenant)
					<tr>
						<td width="25">{{ $i++ }}</td>
						<td>{{ $tenant->name }}</td>
						<td>{{ $tenant->email }}</td>
						<td>
							<a href="{{ route('admin.tenant.show', [$tenant->id]) }}" class="btn btn-primary">Lihat</a>
							@if (Auth::user()->role == 2)
							@if ($tenant->active == 0)
							<form class="form-aksi" action="{{ route('admin.tenant.block_user') }}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $tenant->id }}">
								<input type="submit" class="btn btn-primary" onclick="return conf('Yakin ingin blok penyewa?')" value="Blok Penyewa">
							</form>
							@else
							<form class="form-aksi" action="{{ route('admin.tenant.active_user') }}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $tenant->id }}">
								<input type="submit" class="btn btn-primary" onclick="return conf('Yakin ingin aktifkan penyewa?')" value="Aktifkan Penyewa">
							</form>
							@endif
							@endif
							{{-- <a href="{{ route('admin.tenant.edit', [$tenant->id]) }}" class="btn btn-primary">Edit</a> --}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection