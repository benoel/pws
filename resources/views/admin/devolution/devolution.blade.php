@extends('layouts.agreement')

@section('content')
<div class="agreement-box">
  <h3 class="text-center">SURAT PERNYATAAN PENGALIHAN HAK SEWA - PASAR PAGI ASEMKA</h3>
  <h4 class="text-center">No. {{ $rent->invoice_number }}</h4>
  <div class="divider"></div>
  <p>
    Perjanjian ini dibuat dan ditanda-tangani di Jakarta, pada hari {{ $hari }}, {{ date('d M Y') }} oleh dan antara :
  </p>
  <div>
    <table class="table-agreement">
      <tr>
        <td>1. </td>
        <td>Nama</td>
        <td>: Yulius Edison</td>
      </tr>
      <tr>
        <td></td>
        <td>Jabatan</td>
        <td>: Property Manager</td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2">
          Dalam hal ini bertindak untuk dan atas nama PT. Primantara Wisesa Sejahtera yang selanjutnya disebut Pihak Pertama.
        </td>
      </tr>
    </table>
    <table class="table-agreement">
      <tr>
        <td>2. </td>
        <td>Nama</td>
        <td>: {{ $rent->user->name }} &nbsp;&nbsp;&nbsp;&nbsp;<strong>{{ $rent->user->company != '' ? $rent->user->company : '' }}</strong></td>
      </tr>
      <tr>
        <td></td>
        <td>Alamat</td>
        <td>: {{ $rent->user->address }}</td>
      </tr>
      <tr>
        <td></td>
        <td>KTP / SIM No</td>
        <td>: {{ $rent->user->identity_card_number }}</td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2">
          Dalam  hal ini bertindak untuk dan atas nama diri sendiri yang selanjutnya di sebut Pihak Kedua.
        </td>
      </tr>
    </table>
  </div>
  <p>
    Kedua Pihak sepakat untuk membuat Perjanjian Sewa unit ruangan di Pasar Pagi Asemka dengan kondisi sbb :
  </p>
  <div class="pasal">
    Pasal 1<br>
    OBYEK SEWA & PERUNTUKKAN
  </div>
  <p>Lokasi ruangan, Lantai dan Kode Unit serta luas obyek sewa yaitu :</p>
  <table class="table-detail">
    <tr>
      <td></td>
      <td>Lokasi</td>
      <td>: {{ $rent->unit->floor->name }}</td>
    </tr>
    <tr>
      <td></td>
      <td>Nomor</td>
      <td>: {{ $rent->unit->unit_identity }}</td>
    </tr>
    <tr>
      <td></td>
      <td>Luas</td>
      <td>: {{ $rent->unit->capacious}} m<sup>2</sup></td>
    </tr>
  </table>
  <p>Obyek sewa akan dipakai Pihak Kedua untuk usaha : <span style="font-style: italic;">{{ $rent->user->business_field->name }}</span>.</p>
  <p>Obyek sewa tidak boleh dialihkan Pihak Kedua kepada pihak lain dengan alasan apapun tanpa persetujuan tertulis dari Pihak Pertama. Jika Pihak Kedua melakukan pengalihan obyek sewa ini, maka perjanjian otomatis batal dan semua biaya yang telah dibayarkan tidak akan dikembalikan.</p>
  <div class="pasal">
    Pasal 2<br>
    JANGKA WAKTU SEWA
  </div>
  <p>Jangka Waktu Sewa pada Perjanjian Sewa ini yaitu : <strong style="font-style: italic;">{{ $rent->created_at->format('d M Y') }} - tanggal {{ $rent->end_rent }}</strong></p>
  <div class="pasal">
    Pasal 3<br>
    BIAYA SEWA & CARA PEMBAYARAN
  </div>
  <ul>
    <li>3.1. Biaya atas obyek sewa dimaksud di Pasal 1, yaitu : <strong>{{ $rent->payment_per_month}} per-m<sup>2</sup> per-bulan</strong></li>
    <li>3.2. Total biaya sewa yang harus dibayar Pihak Kedua : <strong>Rp. {{ number_format($rent->total_cost, 0, '.', '.') }}</strong></li>
    <li>3.3. Biaya diatas belum termasuk PPN 10% dan harus dibayarkan di muka sekaligus.</li>
    <li>3.4. Belum termasuk biaya Service Charge dan pemakaian listrik yang harus dibayar setiap bulan sesuai tarif yang berlaku.</li>
    <li>3.5. Biaya Security deposit untuk 3 bulan sewa, jika belum, harus dibayarkan dan akan dikembalikan 100% setelah sewa berakhir dan tidak diperpanjang</li>
  </ul>
  <p>
    Perjanjian ini dibuat rangkap dua, ditanda-tangani di Jakarta oleh Kedua Pihak, bermaterai cukup dan mempunyai kekuatan hukum yang sama, serta dilandasi oleh niat baik.
    Disamping Perjanjian Sewa ini, Pihak Kedua juga menandatangani <strong>Ketentuan Sewa Ruangan & Tata Tertib Gedung Pasar Pagi Asemka</strong> yang merupakan satu kesatuan dengan Perjanjian Sewa ini yang harus dipatuhi oleh Pihak Kedua tanpa kecuali.
  </p>
  <div class="text-center">
    Jakarta, {{ date('Y m d') }}
  </div>
  <table class="assign">
    <tr>
      <td>Pihak pertama,</td>
      <td>Pihak kedua,</td>
    </tr>
    <tr>
      <td>PT. Primantara Wisesa Sejahtera</td>
      <td>{{ $rent->user->company == null ? $rent->user->name : $rent->user->company }}</td>
    </tr>
    <tr>
      <td>
        <br>
        <br>
        <br>
        <br>
      (&nbsp;PT. Primantara Wisesa Sejahtera&nbsp;)</td>
      <td>
        <br>
        <br>
        <br>
        <br>
        (&nbsp;{{ $rent->user->company == null ? $rent->user->name : $rent->user->company }}&nbsp;)</td>
      </tr>
    </table>
  </div>
  @endsection