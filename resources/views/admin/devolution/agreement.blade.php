@extends('layouts.agreement')

@section('content')
<div class="agreement-box">
	<h3 class="text-center">SURAT PERALIHAN HAK SEWA - PASAR PAGI ASEMKA</h3>
	<h4 class="text-center">No. {{ $devolution->transaction_number }}</h4>
	<div class="divider"></div>
	<p>
		Perjanjian ini dicetak dan ditanda-tangani di Jakarta, pada hari {{ $hari }}, {{ date('d M Y') }} oleh dan antara :
	</p>
	<div>
		<table class="table-agreement">
			<tr>
				<td>1. </td>
				<td>Nama</td>
				<td>: {{ $devolution->fromUser->name}} &nbsp;&nbsp;&nbsp;&nbsp;<strong>{{ $devolution->fromUser->company != '' ? $devolution->fromUser->company : '' }}</td>
				</tr>
				<tr>
					<td></td>
					<td>Alamat</td>
					<td>: {{ $devolution->fromUser->address }}</td>
				</tr>
				<tr>
					<td></td>
					<td>KTP / SIM No</td>
					<td>: {{ $devolution->fromUser->identity_card_number }}</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2">
						Dalam hal ini bertindak untuk dan atas nama diri sendiri yang selanjutnya disebut Pihak Pertama sebagai pemilik tanah / yang mengalihkan.
					</td>
				</tr>
			</table>
			<table class="table-agreement">
				<tr>
					<td>2. </td>
					<td>Nama</td>
					<td>: {{ $devolution->toUser->name }} &nbsp;&nbsp;&nbsp;&nbsp;<strong>{{ $devolution->toUser->company != '' ? $devolution->toUser->company : '' }}</strong></td>
				</tr>
				<tr>
					<td></td>
					<td>Alamat</td>
					<td>: {{ $devolution->toUser->address }}</td>
				</tr>
				<tr>
					<td></td>
					<td>KTP / SIM No</td>
					<td>: {{ $devolution->toUser->identity_card_number }}</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2">
						Dalam  hal ini bertindak untuk dan atas nama diri sendiri yang selanjutnya di sebut Pihak Kedua yang menerima pengalihan.
					</td>
				</tr>
			</table>
		</div>
		<p>
			Pihak pertama dengan ini menyatakan hal-hal sebagai berikut :
		</p>
		<table class="table-devolution">
			<tr>
				<td>1. </td>
				<td>
					<p>Pihak pertama telah mengalihkan penguasaan segala hak dan kepentingan atas tempat usaha yang meliputi semua yang di atasnya kepada pihak kedua secara terus menerus hingga saat ini, dan pihak kedua menenerima pengalihan penguasaan dengan cara membayar biaya administrasi kepada pihak PT. PRIMANTARA WISESA SEJAHTERA.</p>
				</td>
			</tr>
			<tr>
				<td>2. </td>
				<td>
					<p>Pembayaran administrasi untuk pengalihan penguasaan atas tempat usaha disepakati oleh kedua belah pihak sebesar Rp. {{ number_format($devolution->cost, 0 , '.', '.')}}, uang tersebut telah diterima oleh pihak PT. PRIMANTARA WISESA SEJAHTERA dan surat pernyataan ini berlaku pula sebagai tanda bukti penerimaan uang (kwitansi).</p>
				</td>
			</tr>
			<tr>
				<td>3. </td>
				<td>
					<p>Tempat usaha yang dialihkan kepada pihak kedua :</p>
					@php($i = 1)
					@foreach ($devolution->devolution_details as $dd)
					<table>
						<tr>
							<td>{{ $i++ }}</td>
							<td>Nomor</td>
							<td>:</td>
							<td>{{ $dd->unit_identity }}</td>
						</tr>
						<tr>
							<td></td>
							<td>Lokasi</td>
							<td>:</td>
							<td>{{ $dd->floor->name }}</td>
						</tr>
						<tr>
							<td></td>
							<td>Luas</td>
							<td>:</td>
							<td>{{ $dd->capacious}} m<sup>2</sup></td>
						</tr>
					</table>
					@endforeach
				</td>
			</tr>
			<tr>
				<td>4. </td>
				<td>
					<p>Pihak pertama menjamin kepada pihak kedua bahwa : </p>
					<table>
						<tr>
							<td>i. </td>
							<td>
								<p>Hanya pihak pertama dan PT. PRIMANTARA WISESA SEJAHTERA yang berhak, berwenang untuk melakukan pengalihan penguasaan.</p>
							</td>
						</tr>
						<tr>
							<td>ii. </td>
							<td>
								<p>Tanah tersebut tidak dijadikan jaminan hutang, tidak terkena sitaan dan tidak tersangkut dengan sesuatu perkara atau sengketa dengan pihak lain.</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<p>Demikian surat pernyataan pengalihan penguasaan ini dibuat dan ditandatangani diatas kertas bermaterai cukup sebagai aslinya, untuk dipergunakan sebagaimana semestinya.</p>
		<div class="text-center">
			Jakarta, {{ date('Y m d') }}
		</div>
		<table class="assign">
			<tr>
				<td>Pihak pertama,</td>
				<td>Pihak kedua,</td>
			</tr>
			<tr>
				<td>{{ $devolution->fromUser->company == null ? $devolution->fromUser->name : $devolution->fromUser->company }}</td>
				<td>{{ $devolution->toUser->company == null ? $devolution->toUser->name : $devolution->toUser->company }}</td>
			</tr>
			<tr>
				<td>
					<br>
					<br>
					<br>
					<br>
					(&nbsp;{{ $devolution->fromUser->name }}&nbsp;)
				</td>
				<td>
					<br>
					<br>
					<br>
					<br>
					(&nbsp;{{ $devolution->toUser->name }}&nbsp;)
				</td>
			</tr>
		</table>
		<table class="assign">
			<tr>
				<td>Persetujan dari :</td>
			</tr>
			<tr>
				<td>PT. PRIMANTARA WISESA SEJAHTERA</td>
			</tr>
			<tr>
				<td>
					<br>
					<br>
					<br>
					<br>
					(&nbsp;Yulius Edison&nbsp;)
				</td>
			</tr>
		</table>
	</div>
	@endsection