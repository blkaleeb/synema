@extends('admin.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-end m-3">
            <a href="{{ url('admin/articles/create') }}" class="btn btn-primary">Add Article</a>
          </div>
          <div class="card">
            <div class="card-header card-header-border-bottom">
              <h2>Article</h2>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($articles as $article)
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
                  @empty
                  <tr>
                      <td colspan='5'>No records Found</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
</div>
@endsection