@extends('admin.layout')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-end m-3">
                <a href="{{ url('admin/categories/create') }}" class="btn btn-primary">Add Categories</a>
            </div>
            <div class="card card-default shadow-sm">
                <div class="card-header card-header-border-bottom">
                    <h2>CATEGORIES</h2>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Parent ID</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->parent ? $category->parent->name : ''}}</td>
                                    <td>
                                        <a href="{{ url('admin/categories/'.$category->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                        {!! Form::open(['url' => 'admin/categories/'. $category->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection