@extends('admin.layout')

@section('content')

@php
    $formTitle = !empty($tags) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Tags</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($tags))
                        {!! Form::model($tags, ['url' => ['admin/tags', $tags->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/tags']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('tags', 'Tags') !!}
                            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Input tags here...']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/tags') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection 