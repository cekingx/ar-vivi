
@extends('layouts.template')

@section('sidebar')
 @include('pages.location._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>Edit Gambar</h1>

  <form action="{{route('location.update-image', ['location' => $location->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
      <div class="col-sm-10">
        <input 
          type="file" 
          class="form-control" 
          id="foto" 
          name="foto" 
          >
      </div>
    </div>
    
    <input type="hidden" name="_method" value="put">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>

</div>
@endsection