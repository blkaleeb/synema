@extends('includes/cms-header', ['activePage' => 'article'])

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @include('includes.flash-message')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="{{ route('admin.article.create') }}" class="btn btn-primary"> Tambah artikel </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Artikel</li>
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
              <h3 class="card-title">Halaman artikel</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Subtitle</th>
                    <th>Deskripsi</th>
                    <th>Views</th>
                    <th>Aksi</th>
                    <th>Aksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($articles as $article)
                  <tr>
                    <td width="20%">{{$article->title}}</td>
                    <td>{{$article->subtitle}}
                    </td>
                    <td>{!! $article->description !!}</td>
                    <td>{{ $article->views }}</td>
                    <td>
                      <a href="{{ url('cms/article/' . $article->id) }}" class="btn btn-primary"> Lihat </a>
                    </td>
                    <td>
                      <a href="{{ url('cms/article/edit/' . $article->id) }}" class="btn btn-primary"> Edit </a>
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-delete-{{$article->id}}">
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

@foreach($articles as $article)
  <div class="modal fade" id="modal-delete-{{$article->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detele Artikel: {{$article->id}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda ingin menghapus artikel {{$article->name}}</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <form action="{{ url('cms/article/destroy/')}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="id" value="{{$article->id}}">
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