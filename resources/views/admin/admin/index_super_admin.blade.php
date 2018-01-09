@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-close">
      <a class="btn btn-primary" href="{{ route('admin.edit', [Auth::user()->id ]) }}">Edit Profil</a>
      &nbsp;
      <a class="btn btn-primary" href="{{ route('admin.change_password', [Auth::user()->id ]) }}">Rubah Password</a>
    </div>
    <div class="card-header d-flex align-items-center">
      <a href="{{ route('admin.create') }}" class="btn btn-primary">Buat admin</a>
    </div>
    <div class="card-body">
      <table id="dataTables" class="table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php ($i = 1)
          @foreach ($admins as $admin)
          <tr>
            <td width="25">{{ $i++ }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            @if (Auth::user()->id != $admin->id )
            <td>
              @if ($admin->active == 0)
              <form class="form-aksi" action="{{ route('admin.block_user')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $admin->id }}">
                <input type="submit" class="btn btn-primary" onclick="return conf('Yakin ingin blok user?')" value="Blok User">
              </form>
              @else
              <form class="form-aksi" action="{{ route('admin.active_user')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $admin->id }}">
                <input type="submit" class="btn btn-primary" onclick="return conf('Yakin ingin aktifkan user?')" value="Aktifkan User">
              </form>
              @endif              
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
