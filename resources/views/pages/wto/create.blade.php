@extends('layouts.template')

@section('sidebar')
 @include('pages.wto._sidebar')
@endsection

@section('content')
<div class="container">

  <h1>WTO file</h1>

  <p>Pastikan nama file yang di upload adalah <strong>taman_ayun.wto</strong></p>

  <form action="{{route('upload.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="wto_file" id="wto_file">
    <button type="submit" class="btn btn-success">Submit</button>
  </form>

</div>
@endsection

@section('modal')
    
@endsection

@section('script')
    
@endsection