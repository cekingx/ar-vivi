@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Lokasi Anda</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user-location.store') }}">
                        @csrf

                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Objek') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                          <div class="col-md-6">
                              <input id="description" type="text" class="form-control" name="description">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="latitude" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>

                          <div class="col-md-6">
                              <input id="latitude" type="text" class="form-control" name="latitude">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="longitude" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>

                          <div class="col-md-6">
                              <input id="longitude" type="text" class="form-control" name="longitude">
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
