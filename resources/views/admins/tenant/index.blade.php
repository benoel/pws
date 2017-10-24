@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.create') }}" class="btn btn-primary">Buat admin</a>
		</div>
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Email</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($admins as $admin)
					<tr>
						<td>{{ $admin->name }}</td>
						<td>{{ $admin->email }}</td>
						@if (Auth::user()->id != $admin->id )
						<td>
							<form class="form-delete" action="{{ route('admin.destroy', [$admin->id]) }}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="delete">
								<input type="submit" class="btn btn-primary" onclick="return confirmDelete()" value="Hapus Akun">
							</form>
						</td>
						@else
						<td><a href="{{ route('admin.edit',  [$admin->id]) }}" class="btn btn-primary">Edit Profile</a></td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection