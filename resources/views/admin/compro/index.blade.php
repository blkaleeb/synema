@extends('admin.layout', ['activePage' => 'Compro'])
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            {{-- <div class="d-flex justify-content-end m-3">
                <a href="{{ url('admin/compro/create') }}" class="btn btn-primary">Add contact</a>
            </div> --}}
            <div class="card card-default shadow-sm">
                <div class="card-header card-header-border-bottom">
                    <h2>Company Information</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    @if (!empty($contacts))
                        {!! Form::model($contacts, ['url' => ['admin/compro', $contacts->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/compro']) !!}
                    @endif
                    <div class="row">
                        <div class="col">
                                <div class="form-group">
                                    {!! Form::label('phone_number', 'Phone number') !!}
                                    {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Input phone number here...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Input email here...']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('address', 'Address') !!}
                                    {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Input address here...']) !!}
                                </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('instagram', 'Instagram') !!}
                                {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'Input instagram here...']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('spotify', 'Spotify') !!}
                                {!! Form::text('spotify', null, ['class' => 'form-control', 'placeholder' => 'Input spotify here...']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('facebook', 'Facebook') !!}
                                {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Input facebook here...']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('twitter', 'Twitter') !!}
                                {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Input twitter here...']) !!}
                            </div>
                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Save</button>
                                <a href="{{ url('admin/contacts') }}" class="btn btn-secondary btn-default">Back</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection