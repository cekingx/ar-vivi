@extends('layouts.template')

@section('sidebar')
 @include('pages.objek-ar._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Objek AR {{ $objekAR->nama_objek}}</h1>

  <form>
    <div class="form-group row">
      <div class="col-sm-2">Nama Objek</div>
      <div class="col-sm-10">{{ $objekAR->nama }}</div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2">Object Name (English)</div>
      <div class="col-sm-10">{{ $objekAR->name }}</div>
    </div>
    
    <div class="form-group row">
      <div class="col-sm-2">Deskripsi</div>
      <div class="col-sm-10">{{ $objekAR->deskripsi }}</div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2">Description (English)</div>
      <div class="col-sm-10">{{ $objekAR->description }}</div>
    </div>

    <a href="{{ route('location.index') }}" class="btn btn-primary">
      <i class="fas fa-arrow-left"></i>
      <span>Back</span>
    </a>
  </form>

</div>
@endsection