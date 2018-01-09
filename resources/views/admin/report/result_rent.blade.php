@extends('layouts.report')

@section('content')

<br>
<div class="card">
  <div class="card-header" style="text-align: center;">
    <h1>Laporan</h1>
    <p style="color: #F4645F; font-weight: bold;" class="text-center">Laporan sewa dari tgl {{ $from }} sampai tgl {{ $to }}</p>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Invoice</th>
          <th>Unit</th>
          <th>Penyewa</th>
          <th>Biaya(include ppn+pph)</th>
        </tr>
      </thead>
      @php($i=1)
      @php($total=0)
      <tbody>
        @foreach ($rents as $rent)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $rent->invoice_number }}</td>
          <td>{{ $rent->unit->unit_identity }}</td>
          <td>{{ $rent->user->name }}</td>
          <td>Rp. {{ number_format($rent->grand_total, 0, '.', '.') }}</td>
          @php($total += $rent->grand_total)
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
