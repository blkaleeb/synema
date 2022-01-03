@extends('admin.layout')

@section('content')

@php
    $formTitle = !empty($songs) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Songs</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($songs))
                        {!! Form::model($songs, ['url' => ['admin/songs', $songs->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/songs']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('artists', 'Artists') !!}
                            {!! Form::text('artists', null, ['class' => 'form-control', 'placeholder' => 'artists']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('genre', 'Genre') !!}
                            {!! Form::text('genre', null, ['class' => 'form-control', 'placeholder' => 'genre']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sound', 'Sound') !!}
                            {!! Form::file('sound', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/songs') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection 