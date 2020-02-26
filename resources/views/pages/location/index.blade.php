@extends('layouts.template')

@section('sidebar')
 @include('pages.location._sidebar')
@endsection

@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Locations</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle btn btn-outline-primary" href="{{ route('location.create') }}" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-plus fa-sm fa-fw"></i>
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Description</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $index => $lokasi)    
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                  <a href="{{ route('location.show', ['location' => $lokasi->id]) }}">
                    {{ $lokasi->name }}
                  </a>
                </td>
                <td>{{ $lokasi->description }}</td>
                <td>{{ $lokasi->latitude }}</td>
                <td>{{ $lokasi->longitude }}</td>
                <td>
                  <a href="{{ route('location.edit', ['location' => $lokasi->id]) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i>
                    <span>Edit</span>
                  </a>
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

              {{-- Delete --}}
              <form 
                action="{{ route('location.destroy', ['location' => $lokasi->id]) }}" 
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

</div>
@endsection

@section('modal')
    
@endsection

@section('script')
    
@endsection