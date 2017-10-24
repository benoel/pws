@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Halo</h3>
    </div>
    <div class="card-body">
      {{-- <table>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td> {{ Auth::user()->name }}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td> {{ Auth::user()->email }}</td>
        </tr>
      </table> --}}
      <a class="btn btn-primary" href="{{ route('admin.edit', [Auth::user()->id ]) }}">Edit Profil</a>
      <a class="btn btn-primary" href="{{ route('admin.change_password', [Auth::user()->id ]) }}">Rubah Password</a>
    </div>
  </div>
</div>
@endsection
