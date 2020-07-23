@extends('layouts.template')

@section('sidebar')
 @include('pages.location._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Lokasi {{ $lokasi->nama_objek }}</h1>

  <form>
    <div class="form-group row">
      <div class="col-sm-2">Nama Objek</div>
      <div class="col-sm-10">{{ $lokasi->name }}</div>
    </div>
    
    <div class="form-group row">
      <div class="col-sm-2">Deskripsi</div>
      <div class="col-sm-10">{{ $lokasi->description }}</div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2">Latitude</div>
      <div class="col-sm-10">{{ $lokasi->latitude }}</div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2">Longitude</div>
      <div class="col-sm-10">{{ $lokasi->longitude }}</div>
    </div>

    <div class="form-group-row">
      <img src="{{ $lokasi->image }}" alt="Image" class="img-thumbnail"> 
    </div>

    <a href="{{ route('location.index') }}" class="btn btn-primary">
      <i class="fas fa-arrow-left"></i>
      <span>Back</span>
    </a>
    <a href="{{ route('location.edit-image', ['location' => $lokasi->id]) }}" class="btn btn-secondary">
      <span>Edit Image</span>
    </a>
  </form>

</div>
@endsection