@extends('admin.layout', ['activePage' => 'tree'])

@section('content')

@php
    $formTitle = !empty($tree) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} tree</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($tree))
                        {!! Form::model($tree, ['url' => ['admin/tree', $tree->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/tree']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('judul', 'Judul') !!}
                            {!! Form::text('judul', null, ['class' => 'form-control', 'placeholder' => 'judul']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link') !!}
                            {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'link']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/tree') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection 