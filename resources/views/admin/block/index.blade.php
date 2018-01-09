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