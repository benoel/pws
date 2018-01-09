@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.other_transaction.store') }}">
        {{csrf_field()}}
        <div class="form-group">
          <label class="form-control-label">Nomor Transaksi</label>&nbsp;:&nbsp;
          {{ $trans_num }}
        </div>
        <div style="width: 100%;" class="form-group{{ $errors->has('unit_id') ? ' has-danger' : '' }}">
          <label class="form-control-label">Unit</label>
          <select name="unit_id" class="form-control select2">
            <option selected disabled>Pilih unit</option>
            @foreach ($units as $unit)
            <option {{ old('unit_id') == $unit->id ? 'selected' : '' }} value="{{ $unit->id }}">{{ $unit->unit_identity }}</option>
            @endforeach
          </select>
          @if ($errors->has('unit_id'))
          <small class="form-text">{{ $errors->first('unit_id') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('note') ? ' has-danger' : '' }}">
          <label class="form-control-label">Keterangan</label>
          <input type="text" name="note" value="{{ old('note') }}" class="form-control">
          @if ($errors->has('note'))
          <small class="form-text">{{ $errors->first('note') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('cost_other') ? ' has-danger' : '' }}">
          <label class="form-control-label">Besar Biaya</label>
          <input type="text" name="cost_other" value="{{ old('cost_other') }}" class="form-control">
          @if ($errors->has('cost_other'))
          <small class="form-text">{{ $errors->first('cost_other') }}</small>
          @else
          <small class="form-text" style="color: #333">Tuliskan tanpa "," atau "."</small>
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
