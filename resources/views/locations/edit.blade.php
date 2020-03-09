@extends('layouts.app')

@section('content')
  <form action="{{route('location.update', ['location' => $location->id])}}" method="post">
    @csrf
    <p>Nama Lokasi</p>
    <input type="text" name="nama_objek" id="nama_objek" value="{{$location->nama_objek}}">
    <br/>
    <p>Latitude</p>
    <input type="text" name="latitude" id="latitude" value="{{$location->latitude}}">
    <br/>
    <p>Longitude</p>
    <input type="text" name="longitude" id="longitude" value="{{$location->longitude}}">
    <br/>
    <input type="hidden" name="_method" value="put">
    <button type="submit">Submit</button>
  </form>
@endsection