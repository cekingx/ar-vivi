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

                        {{-- Owner --}}
                        <div class="form-group row">
                          <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Pemilik') }}</label>

                          <div class="col-md-6">
                            <input id="owner" type="text" class="form-control" name="owner">
                          </div>
                        </div>

                        {{-- Phone --}}
                        <div class="form-group row">
                          <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP') }}</label>

                          <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" name="phone">
                          </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                          <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email">
                          </div>
                        </div>

                        {{-- Nama Tempat --}}
                        <div class="form-group row">
                          <label for="nama_tempat" class="col-md-4 col-form-label text-md-right">{{ __('Nama Objek') }}</label>

                          <div class="col-md-6">
                              <input id="nama_tempat" type="text" class="form-control" name="nama_tempat">
                          </div>
                        </div>

                        {{-- Description --}}
                        <div class="form-group row">
                          <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                          <div class="col-md-6">
                              <input id="description" type="text" class="form-control" name="description">
                          </div>
                        </div>

                        {{-- Latitude --}}
                        <div class="form-group row">
                          <label for="latitude" class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>

                          <div class="col-md-6">
                              <input id="latitude" type="text" class="form-control" name="latitude">
                          </div>
                        </div>

                        {{-- Longitude --}}
                        <div class="form-group row">
                          <label for="longitude" class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>

                          <div class="col-md-6">
                              <input id="longitude" type="text" class="form-control" name="longitude">
                          </div>
                        </div>

                        {{-- Button --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
