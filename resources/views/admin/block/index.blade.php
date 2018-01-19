@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<a href="{{ route('admin.block.create') }}" class="btn btn-primary">Buat Blok</a>
		</div>
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Blok</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($blocks as $block)
					<tr>
						<td width="25">{{ $i++ }}</td>
						<td>{{ $block->name }}</td>
						<td>
							@if (Auth::user()->role == 2)
							<form class="form-aksi" action="{{ route('admin.block.destroy', [$block->id]) }}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="delete">
								<button type="submit" class="btn btn-primary">Hapus</button>
							</form>
							@endif
							<a href="{{ route('admin.block.edit', [$block->id]) }}" class="btn btn-primary">Edit</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection