@extends('admin.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-end m-3">
                <a href="{{ url('admin/links/create') }}" class="btn btn-primary">Add links</a>
            </div>
            <div class="card card-default shadow-sm">
                <div class="card-header card-header-border-bottom">
                    <h2>Links</h2>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Page</th>
                                <th>Description</th>
                                <th>Keywords</th>
                                <th style="width: 30%;">script</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($links as $link)
                                <tr>
                                    <td>{{$link->id}}</td>
                                    <td>{{$link->name}}</td>
                                    <td>{{$link->description}}</td>
                                    <td>{{$link->keywords}}</td>
                                    <td>{{$link->script}}</td>
                                    <td>
                                        <a href="{{ url('admin/links/'.$link->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        {!! Form::open(['url' => 'admin/links/'. $link->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                        {{ $links->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection