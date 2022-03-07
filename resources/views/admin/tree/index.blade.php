@extends('admin.layout', ['activePage' => 'Tree'])
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-end m-3">
                <a href="{{ url('admin/tree/create') }}" class="btn btn-primary">Add trees</a>
            </div>
            <div class="card card-default shadow-sm">
                <div class="card-header card-header-border-bottom">
                    <h2>trees</h2>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>judul</th>
                                <th>Links</th>
                                <th>Click</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($trees as $tree)
                                <tr>
                                    <td>{{$tree->id}}</td>
                                    <td>{{$tree->judul}}</td>
                                    <td>{{$tree->link}}</td>
                                    <td>{{$tree->click}}</td>
                                    <td>
                                        <a href="{{ url('admin/tree/'.$tree->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        {!! Form::open(['url' => 'admin/tree/'. $tree->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection