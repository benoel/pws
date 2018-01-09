@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center">
				<h3 class="h4">Detail Info</h3>
			</div>
			<table class="table">
				<tr>
					<td>Nama</td>
					<td>: {{ $tenant->name }}</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: {{ $tenant->address }}</td>
				</tr>
				<tr>
					<td>No. Telp/HP</td>
					<td>: {{ $tenant->phone_number }}</td>
				</tr>
				<tr>
					<td>No. Identitas</td>
					<td>: {{ $tenant->identity_card_number }}</td>
				</tr>
				<tr>
					<td>npwp</td>
					<td>: {{ $tenant->npwp }}</td>
				</tr>
				<tr>
					<td>Perusahaan</td>
					<td>: {{ $tenant->company != '' ? $tenant->company : '-' }}</td>
				</tr>
				<tr>
					<td>Jenis Usaha</td>
					<td>: {{ $tenant->business_field->name }}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>: {{ $tenant->isActive() ? 'Aktif' : 'Blok' }}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@endsection