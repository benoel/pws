@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.unit.update', [$unit->id]) }}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group{{ $errors->has('unit_identity') ? ' has-danger' : '' }}">
          <label class="form-control-label">Kode Unit</label>
          <input type="text" name="unit_identity" value="{{ $unit->unit_identity }}" class="form-control">
          @if ($errors->has('unit_identity'))
          <small class="form-text">{{ $errors->first('unit_identity') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('va_number') ? ' has-danger' : '' }}">
          <label class="form-control-label">Nomor VA</label>
          <input type="text" name="va_number" value="{{ $unit->va_number }}" class="form-control">
          @if ($errors->has('va_number'))
          <small class="form-text">{{ $errors->first('va_number') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('capacious') ? ' has-danger' : '' }}">
          <label class="form-control-label">Luas Unit/m<sup>2</sup></label>
          <input type="text" name="capacious" value="{{ $unit->capacious }}" class="form-control">
          @if ($errors->has('capacious'))
          <small class="form-text">{{ $errors->first('capacious') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('floor_id') ? ' has-danger' : '' }}">
          <label class="form-control-label">Lantai Unit</label>
          <select name="floor_id" class="form-control select2">
            <option selected disabled>Pilih lantai</option>
            @foreach ($floors as $floor)
            <option {{ $unit->floor->id == $floor->id ? 'selected' : '' }} value="{{ $floor->id }}">{{ $floor->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('floor_id'))
          <small class="form-text">{{ $errors->first('floor_id') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('block_id') ? ' has-danger' : '' }}">
          <label class="form-control-label">Blok Unit</label>
          <select name="block_id" class="form-control select2">
            <option selected disabled>Pilih blok</option>
            @foreach ($blocks as $block)
            <option {{ $unit->block->id == $block->id ? 'selected' : '' }} value="{{ $block->id }}">{{ $block->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('block_id'))
          <small class="form-text">{{ $errors->first('block_id') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('type_id') ? ' has-danger' : '' }}">
          <label class="form-control-label">Tipe Unit</label>
          <select name="type_id" class="form-control select2">
            <option selected disabled>Pilih tipe</option>
            @foreach ($types as $type)
            <option {{ $unit->type->id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('type_id'))
          <small class="form-text">{{ $errors->first('type_id') }}</small>
          @endif
        </div>
        <div class="form-group{{ $errors->has('cost_unit') ? ' has-danger' : '' }}">
          <label class="form-control-label">Harga Unit/bulan</label>
          <input type="text" name="cost_unit" value="{{ $unit->cost }}" class="form-control">
          @if ($errors->has('cost_unit'))
          <small class="form-text">{{ $errors->first('cost_unit') }}</small>
          @else
          <small class="form-text" style="color: #999;">Tuliskan tanpa "," atau "."</small>
          @endif
        </div>
        <div class="form-group">       
          <input type="submit" value="Edit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
