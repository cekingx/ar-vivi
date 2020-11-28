@extends('layouts.template')

@section('sidebar')
 @include('pages.location._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Edit Lokasi</h1>

  <form action="{{route('location.update', ['location' => $location->id])}}" method="post">
    @csrf
    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama Lokasi</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          class="form-control" 
          id="nama" 
          name="nama" 
          value="{{$location->nama}}"
          >
      </div>
    </div>

    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Location Name (English)</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          class="form-control" 
          id="name" 
          name="name" 
          value="{{$location->name}}"
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
          value="{{$location->deskripsi}}"
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
          value="{{$location->description}}"
          >
      </div>
    </div>

    <div class="form-group row">
      <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          class="form-control" 
          id="latitude" 
          name="latitude"
          value="{{$location->latitude}}"
          >
      </div>
    </div>

    <div class="form-group row">
      <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
      <div class="col-sm-10">
        <input 
          type="text" 
          class="form-control" 
          id="longitude" 
          name="longitude"
          value="{{$location->longitude}}"
          >
      </div>
    </div>
    
    <input type="hidden" name="_method" value="put">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

</div>
@endsection