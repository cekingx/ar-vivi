@extends('layouts.template')

@section('sidebar')
 @include('pages.objek-ar._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Edit Objek AR</h1>

  <form action="{{route('objek-ar.update', ['objek_ar' => $objekAR->id])}}" method="post">
    @csrf
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama Objek</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          class="form-control" 
          id="nama" 
          name="nama"
          value="{{$objekAR->nama}}"
        >
      </div>
    </div>

    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Object Name (English)</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          class="form-control" 
          id="name" 
          name="name"
          value="{{$objekAR->name}}"
        >
      </div>
    </div>

    <div class="form-group row">
      <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          class="form-control" 
          id="deskripsi" 
          name="deskripsi"
          value="{{$objekAR->deskripsi}}"
        >
      </div>
    </div>

    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">Description (English)</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          class="form-control" 
          id="description" 
          name="description"
          value="{{$objekAR->description}}"
        >
      </div>
    </div>
    
    <input type="hidden" name="_method" value="put">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

</div>
@endsection