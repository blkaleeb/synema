@extends('admin.layout', ['activePage' => 'Artists'])
@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
          <div class="d-flex justify-content-end m-3">
            <a href="{{ url('admin/artists/create') }}" class="btn btn-primary">Add artist</a>
          </div>
          <div class="card">
            <div class="card-header card-header-border-bottom">
              <h2>Artist</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @include('admin.partials.flash')
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Roles</th>
                    <th>image</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($artists as $artist)
                  <tr>
                    <td width="20%">{{$artist->name}}</td>
                    <td>{{$artist->role}}</td>
                    <td>
                      <img src="{{ asset('storage/'.$artist->image)}}" class="img-fluid mb-2" alt="white sample" style="max-width: 200px;"/>
                    </td>
                    <td>{!! $artist->description !!}</td>
                    <td>
                      <a href="{{ url('admin/artists/'.$artist->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                      {!! Form::open(['url' => 'admin/artists/'. $artist->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                      {!! Form::close() !!}
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