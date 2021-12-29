@extends('admin.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-end m-3">
                <a href="{{ url('admin/songs/create') }}" class="btn btn-primary">Add songs</a>
            </div>
            <div class="card card-default shadow-sm">
                <div class="card-header card-header-border-bottom">
                    <h2>MUSIC</h2>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($songs as $song)
                                <tr>
                                    <td>{{$song->id}}</td>
                                    <td>{{$song->sku}}</td>
                                    <td>{{$song->name}}</td>
                                    <td>{{$song->price}}</td>
                                    <td>{{$song->status}}</td>
                                    <td>
                                        <a href="{{ url('admin/songs/'.$song->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        {!! Form::open(['url' => 'admin/songs/'. $song->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                        {{ $songs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection