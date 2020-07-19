@extends('layouts.template')

@section('sidebar')
 @include('pages.location._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Tambahkan Lokasi Baru</h1>

  <form action="{{route('location.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Nama Objek</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name">
      </div>
    </div>

    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description">
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
    
    <div class="form-group row">
      <label for="foto" class="col-sm-2 col-form-label">Foto</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="foto" name="foto">
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

</div>
@endsection