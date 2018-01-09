@extends('layouts.report')

@section('content')

<br>
<div class="card">
  <div class="card-header" style="text-align: center;">
    <h1>Laporan</h1>
    <p style="color: #F4645F; font-weight: bold;" class="text-center">Laporan pembayaran sewa dari tgl {{ $from }} sampai tgl {{ $to }}</p>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Invoice</th>
          <th>Kwitansi</th>
          <th>Penyewa</th>
          <th>Unit</th>
          <th>Biaya</th>
        </tr>
      </thead>
      @php($i=1)
      @php($total=0)
      <tbody>
        @foreach ($rent_payments as $rp)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $rp->rent->invoice_number }}</td>
          <td>{{ $rp->receipt_number }}</td>
          <td>{{ $rp->rent->unit->unit_identity }}</td>
          <td>{{ $rp->rent->user->name }}</td>
          <td>Rp. {{ number_format($rp->payment_amount, 0, '.', '.') }}</td>
          @php($total += $rp->payment_amount)
        </tr>
        @endforeach
        <tr>
          <td></td>
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
