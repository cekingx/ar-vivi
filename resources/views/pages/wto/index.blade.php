@extends('layouts.template')

@section('sidebar')
 @include('pages.wto._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>WTO file</h1>

  <form>
    <div class="form-group row">
      <div class="col-sm-2">Link</div>
      <div class="col-sm-10">{{ $data }}</div>
    </div>

    <a href="{{ route('upload.create') }}" class="btn btn-warning">
      <span>Update</span>
    </a>
    <a href="{{ route('objek-ar.index') }}" class="btn btn-success">
      <span>Objek AR</span>
    </a>
  </form>
</div>
@endsection

@section('modal')
    
@endsection

@section('script')
    
@endsection
