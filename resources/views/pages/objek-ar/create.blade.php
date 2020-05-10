@extends('layouts.template')

@section('sidebar')
 @include('pages.objek-ar._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Tambahkan Objek AR Baru</h1>

  <form action="{{route('objek-ar.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="nama_objek" class="col-sm-2 col-form-label">Nama Objek</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama_objek" name="nama_objek">
      </div>
    </div>

    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description">
      </div>
    </div>

    <div class="form-group row">
      <label for="nama_objek" class="col-sm-2 col-form-label">File WTO</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="wto_file" name="wto_file">
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

</div>
@endsection
