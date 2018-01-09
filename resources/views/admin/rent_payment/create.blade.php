@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.rent_payment.store', [$rent_id]) }}">
        {{csrf_field()}}
        <div class="form-group">
          <label class="form-control-label">Nomor Kwitansi</label>&nbsp;:&nbsp;
          {{ $rec_num }}
        </div>
        <div class="form-group{{ $errors->has('payment_amount') ? ' has-danger' : '' }}">
          <label class="form-control-label">Jumlah Bayar</label>
          <input type="text" name="payment_amount" value="{{ old('payment_amount') }}" class="form-control">
          @if ($errors->has('payment_amount'))
          <small class="form-text">{{ $errors->first('payment_amount') }}</small>
          @endif
        </div>
        <div class="form-group">       
          <input type="submit" value="Buat" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
