@extends('admin.layout')

@section('content')

@php
    $formTitle = !empty($categories) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Article Category</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($categories))
                        {!! Form::model($categories, ['url' => ['admin/article_category', $categories->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/article_category']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('categories', 'Category') !!}
                            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Input new category here...']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/article_category') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection 