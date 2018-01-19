@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<div class="card-header d-flex align-items-center">
				<div class="card-close" style="margin: 10px 10px 0 0;">
					@if ($rent->status != 'Lunas')
					<a class="btn btn-primary" href="{{ route('admin.rent_payment.create', [$rent->id ]) }}">Input Pembayaran</a>
					@endif
					<a class="btn btn-primary" href="{{ route('admin.rent.index') }}">Kembali</a>
					@if (Auth::user()->role == 2)
					<form class="form-aksi" action="{{ route('admin.rent.destroy', [$rent->id]) }}" method="post">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="delete">
						<button type="submit" class="btn btn-primary">Hapus</button>
					</form>
					@endif
					<a class="btn btn-primary" href="{{ route('admin.rent.agreement', [$rent->id ]) }}">Surat Perjanjian</a>
					<a class="btn btn-primary" href="{{ route('admin.rent.invoice', [$rent->id ]) }}">Invoice</a>
				</div>

				<h3 class="h4">Detail Sewa</h3>
			</div>
			<table class="table">
				<tr>
					<td>Nomor Invoice</td>
					<td>: {{ $rent->invoice_number }}</td>
				</tr>
				<tr>
					<td>Nomor Unit</td>
					<td>: {{ $rent->unit->unit_identity }}</td>
				</tr>
				<tr>
					<td>Penyewa</td>
					<td>: <a href="{{ route('admin.tenant.show', [$rent->user->id]) }}">{{ $rent->user->name }}</a></td>
				</tr>
				<tr>
					<td>Lama Sewa</td>
					<td>: {{ $rent->rent_length }} Bulan</td>
				</tr>
				<tr>
					<td>Mulai Tanggal Sewa</td>
					<td>: {{ $rent->created_at->format('d M Y') }}</td>
				</tr>
				<tr>
					<td>Akhir Tanggal Sewa</td>
					@php ($color = '#666')
					@php ($status = '')
					@if ($rent->end_rent > date('d M Y'))
					@php ($color = '#CD483E')
					@php ($status = '(Sudah Lewat)')
					@endif
					<td style="color:{{ $color }}">: {{ $rent->end_rent }} {{ $status }}</td>
				</tr>
				<tr>
					<td>Total Sewa</td>
					<td>: Rp {{ number_format($rent->total_cost, 0, '.', '.') }}</td>
				</tr>
				<tr>
					<td>Biaya Servis</td>
					<td>: Rp {{ number_format($rent->service_charge, 0, '.', '.') }}</td>
				</tr>
				<tr>
					<td>Ppn</td>
					<td>: Rp {{ number_format($rent->ppn, 0, '.', '.') }}</td>
				</tr>
				<tr>
					<td>Pph</td>
					<td>: Rp {{ number_format($rent->pph, 0, '.', '.') }}</td>
				</tr>
				<tr>
					<td><strong>Grand Total</strong></td>
					<td>: Rp {{ number_format($rent->grand_total, 0, '.', '.') }}</td>
				</tr>
				<tr style="border-top: 2px solid #333;">
					<td><strong>Dibayar</strong></td>
					<td>: Rp {{ number_format($rent->rent_payments->sum('payment_amount'), 0, '.','.') }}</td>
				</tr>
				<tr>
					<td><strong>Sisa</strong></td>
					<td>: Rp {{ number_format($rent->remain_payment, 0, '.','.') }}</td>
				</tr>
				<tr>
					<td><strong>Status</strong></td>
					<td>: {{ $rent->status }}</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<table id="dataTables" class="table" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No. Kwitansi</th>
						<th>Jumlah Bayar</th>
						<th>Tgl Bayar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php ($i = 1)
					@foreach ($rent->rent_payments as $rent_payment)
					<tr>
						<td>{{ $rent_payment->receipt_number }}</td>
						<td>Rp {{ number_format($rent_payment->payment_amount, 0, '.', '.') }}</td>
						{{-- <td>{{ $rent_payment->created_at->diffForHumans() }}</td> --}}
						<td>{{ $rent_payment->created_at->format('d M Y') }}</td>
						<td>
							<a href="{{ route('admin.rent_payment.receipt', [$rent->id, $rent_payment->id]) }}" class="btn btn-primary">Kwitansi</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection