@extends('layouts.template')

@section('sidebar')
 @include('pages.objek-ar._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Tambahkan Objek AR Baru</h1>

  <form action="{{route('objek-ar.store')}}" method="post">
    @csrf
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama Objek</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama">
      </div>
    </div>

    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Object Name (English)</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name">
      </div>
    </div>

    <div class="form-group row">
      <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
      </div>
    </div>

    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">Description (English)</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description">
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

</div>
@endsection