@extends('layouts.template')

@section('sidebar')
 @include('pages.location._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Tambahkan Lokasi Baru</h1>

  <form action="{{route('location.store')}}" method="post">
    @csrf
    <div class="form-group row">
      <label for="nama_objek" class="col-sm-2 col-form-label">Nama Objek</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_objek" name="nama_objek">
      </div>
    </div>

    <div class="form-group row">
      <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="latitude" name="latitude">
      </div>
    </div>

    <div class="form-group row">
      <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="longitude" name="longitude">
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

</div>
@endsection