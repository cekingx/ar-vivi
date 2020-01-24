@extends('layouts.app')

@section('content')
  <form action="{{route('location.store')}}" method="post">
    @csrf
    <p>Nama Lokasi</p>
    <input type="text" name="nama_objek" id="nama_objek">
    <br/>
    <p>Latitude</p>
    <input type="text" name="latitude" id="latitude">
    <br/>
    <p>Longitude</p>
    <input type="text" name="longitude" id="longitude">
    <br/>
    <button type="submit">Submit</button>
  </form>
@endsection