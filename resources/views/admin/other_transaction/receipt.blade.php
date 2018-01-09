@extends('layouts.invoice')

@section('content')
<div class="invoice-box">
	<h3>PT. PRIMANTARA WISESA SEJAHTERA</h3>
	<h4>Gedung Pasar pagi Lt. 8 Jl .ASEMKA No. 1 Jakarta Barat</h4>
	<h4>Kode Pos. 11110, Telp. (021)6320070, Fax, (021)6310565</h4>

	<div class="title">
		<span style="border-bottom: 2px solid #263238;">KWITANSI</span> <br>
		<span style="font-size: 16px;">{{ $ot->transaction_number }}</span>
	</div>

	<table style="max-width:40%;">
		<tr>
			<td>Tanggal Bayar</td>
			<td>: {{ $ot->created_at->format('d M Y') }}</td>
		</tr>
	</table>


	<table cellpadding="0" cellspacing="0">
		<tr class="heading">
			<td>
				No
			</td>
			<td>
				Unit
			</td>
			<td>
				Luas
			</td>
			<td>
				Lantai
			</td>
			<td>
				Keterangan
			</td>
			<td style="text-align: right;">
				Total
			</td>
		</tr>

		<tr class="item">
			<td>
				1
			</td>
			<td>
				No. Unit : {{ $ot->unit->unit_identity }}
			</td>
			<td>
				{{ $ot->unit->capacious }} m<sup>2</sup>
			</td>
			<td>
				{{ $ot->unit->floor->name }}</sup>
			</td>
			<td>
				{{ $ot->note }}</sup>
			</td>
			<td style="text-align: right;">
				Rp {{ number_format($ot->cost, 0 , '.', '.')}}
			</td>
		</tr>



		<tr class="total">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td style="text-align: right;">
				Grand Total : Rp {{ number_format($ot->cost, 0 , '.', '.')}}
			</td>
		</tr>
	</table>

	<div class="buttom-invoice">
		<div class="note">
			1. Pembayaran Sewa & Service Charge paling lambat tgl 10 bulan berjalan, <br>
			2. Apabila Tenant akan berhenti menyewa (Kios/Gudang/Konter) Dijawibkan untuk melapor ke pihak manajemen untuk menghindari hal-hal yang tidak diinginkan.
		</div>
		<div class="note">
			CATATAN : <br>
			DILARANG MENYIMPAN BARANG -BARANG YANG MUDAH TERBAKAR DIDIALAM GUDANG SEPERTI: MINYAK TANAH, BENSIN, ALKOHOL, SPIRTUS, DLL
		</div>

		<div class="paraf">
			<div class="text">
				Paraf
				<br><br><br><br>
				(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
			</div>
		</div>
	</div>
</div>
@endsection