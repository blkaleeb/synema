@extends('includes/cms-header', ['activePage' => 'product'])

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @include('includes.flash-message')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="{{ route('admin.product.create') }}" class="btn btn-primary"> Tambah produk </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
              <h3 class="card-title">Halaman produk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Subtitle</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                    <th>Aksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td width="20%">{{$product->name}}</td>
                    <td>{{$product->subtitle}}</td>
                    <td>{!! $product->description !!}</td>
                    <td>
                      <a href="{{ url('cms/product/' . $product->id) }}" class="btn btn-primary"> Lihat </a>
                    </td>
                    <td>
                      <a href="{{ url('cms/product/edit/' . $product->id) }}" class="btn btn-primary"> Edit </a>
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-delete-{{$product->id}}">
                        Hapus
                      </button>
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

@foreach($products as $product)
  <div class="modal fade" id="modal-delete-{{$product->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Produk: {{$product->id}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda ingin menghapus product {{$product->name}}</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <form action="{{ url('cms/product/destroy/')}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="id" value="{{$product->id}}">
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