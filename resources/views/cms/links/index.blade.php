@extends('includes/cms-header', ['activePage' => 'links'])

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @include('includes.flash-message')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="{{ route('admin.link.create') }}" class="btn btn-primary"> Tambah Page </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Links</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Halaman Links</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Page</th>
                    <th>Description</th>
                    <th>Keywords</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($links as $link)
                  <tr>
                    <td width="20%">{{$link->name}}</td>
                    <td width="20%">{{$link->description}}</td>
                    <td width="20%">{{$link->keywords}}</td>
                    <td width="20%">
                        <a href="{{ url('cms/links/edit/' . $link->id) }}"class="btn btn-sm btn-info">Edit</a>
                        <button class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#modal-delete-{{$link->id}}">delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@foreach($links as $link)
  <div class="modal fade" id="modal-delete-{{$link->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete link: {{$link->id}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda ingin menghapus link {{$link->name}}?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <form action="{{ url('cms/links/destroy/')}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="id" value="{{$link->id}}">
            <button type="submit" class="btn btn-primary">Ya</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endforeach

@endsection