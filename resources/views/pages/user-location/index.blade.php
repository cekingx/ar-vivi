@extends('layouts.template')

@section('sidebar')
 @include('pages.user-location._sidebar')
@endsection

@section('content')
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">User Locations</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Owner</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Nama Tempat</th>
              <th>Deskripsi</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $index => $lokasi)    
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $lokasi->owner }}</td>
                <td>{{ $lokasi->phone }}</td>
                <td>{{ $lokasi->email }}</td>
                <td>{{ $lokasi->nama_tempat }}</td>
                <td>{{ $lokasi->description }}</td>
                <td>{{ $lokasi->latitude }}</td>
                <td>{{ $lokasi->longitude }}</td>
                <td>
                  <button 
                    class="btn btn-success" 
                    onclick="event.preventDefault();
                    document.getElementById('verify-location{{$lokasi->id}}').submit();"
                  >
                    Verify
                  </button>

                  <button 
                    class="btn btn-danger" 
                    onclick="event.preventDefault();
                    document.getElementById('delete-location{{$lokasi->id}}').submit();"
                  >
                    <i class="fas fa-trash-alt"></i>
                    <span>Delete</span>
                  </button>
                  
                </td>
              </tr>
              {{-- Verification --}}
              <form 
                action="{{ route('user-location.verify', ['user_location' => $lokasi->id]) }}" 
                id="verify-location{{$lokasi->id}}" 
                method="post" 
                style="display: none;"
              >
                @csrf
              </form>

              {{-- Delete --}}
              <form 
                action="{{ route('user-location.delete', ['user_location' => $lokasi->id]) }}" 
                id="delete-location{{$lokasi->id}}" 
                method="post" 
                style="display: none;"
              >
                @csrf
                <input type="hidden" name="_method" value="delete">
              </form>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

  @if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
  @endif

</div>
@endsection

@section('modal')
    
@endsection

@section('script')
    
@endsection