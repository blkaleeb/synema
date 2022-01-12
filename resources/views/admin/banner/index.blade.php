@extends('admin.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-end m-3">
            <a href="{{ url('admin/banners/create') }}" class="btn btn-primary">Add Banner</a>
          </div>
          <div class="card">
            <div class="card-header card-header-border-bottom">
              <h2>Banner</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>image</th>
                    <th>Description</th>
                    <th>Songs</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($banners as $banner)
                  <tr>
                    <td width="20%">{{$banner->title}}</td>
                    <td>{{$banner->subtitle}}</td>
                    <td>
                      <img src="{{ asset('storage/'.$banner->image)}}" class="img-fluid mb-2" alt="white sample" style="max-width: 200px;"/>
                    </td>
                    <td>{!! $banner->description !!}</td>
                    <td>{{ $banner->songs_id }}</td>
                    <td>
                      <a href="{{ url('admin/banners/'.$banner->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                      {!! Form::open(['url' => 'admin/banners/'. $banner->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan='6'>No records Found</td>
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