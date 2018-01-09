@extends('layouts.report')

@section('content')

<br>
<div class="card">
  <div class="card-header" style="text-align: center;">
    <h1>Laporan</h1>
    <p style="color: #F4645F; font-weight: bold;" class="text-center">Laporan peralihan dari tgl {{ $from }} sampai tgl {{ $to }}</p>
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
        @foreach ($devolutions as $devolution)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $devolution->transaction_number }}</td>

          @php ($out = array())
          @foreach ($devolution->devolution_details as $dd)
          @php (array_push($out, $dd->unit->unit_identity))
          @endforeach
          <td>{{ implode(', ', $out) }}</td>

          <td>Dari {{ $devolution->fromUser->name }} ke {{ $devolution->toUser->name }}</td>
          <td>Rp. {{ number_format($devolution->cost, 0, '.', '.') }}</td>
          @php($total += $devolution->cost)
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
