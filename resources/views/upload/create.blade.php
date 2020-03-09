@extends('layouts.app');

@section('content')
  <form action="{{route('upload.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" id="image">
    <button type="submit">Submit</button>
  </form>
@endsection