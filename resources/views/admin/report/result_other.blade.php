@extends('layouts.report')

@section('content')

<br>
<div class="card">
  <div class="card-header" style="text-align: center;">
    <h1>Laporan</h1>
    <p style="color: #F4645F; font-weight: bold;" class="text-center">Laporan biaya lain-lain dari tgl {{ $from }} sampai tgl {{ $to }}</p>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>No. Transaksi</th>
          <th>Unit</th>
          <th>Keterangan</th>
          <th>Biaya</th>
        </tr>
      </thead>
      @php($i=1)
      @php($total=0)
      <tbody>
        @foreach ($others as $other)
        <tr>
         <td width="25">{{ $i++ }}</td>
         <td>{{ $other->transaction_number }}</td>
         <td>{{ $other->unit->unit_identity }}</td>
         <td>{{ $other->note }}</td>
         <td>Rp. {{ number_format($other->cost, 0, '.', '.') }}</td>
         @php($total += $other->cost)
       </tr>
       @endforeach
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td style="font-weight: 800;">TOTAL</td>
        <td style="font-weight: 800;">Rp. {{ number_format($total, 0, '.', '.') }}</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
@endsection
