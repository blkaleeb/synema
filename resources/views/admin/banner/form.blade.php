@extends('admin.layout', ['activePage' => 'Banner'])

@section('content')

@php
    $formTitle = !empty($banner) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Banner </h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($banner))
                        {!! Form::model($banner, ['url' => ['admin/banners', $banner->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/banners', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image') !!}
                            <div class="col-sm-6">
                                {!! Form::file('images[0]', ['id' => 'mainImage']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subtitle', 'Subtitle') !!}
                            {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'subtitle']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'summernote', 'placeholder' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('songs', 'Songs') !!}
                            {!! Form::select('songs', $songs , $songsId, ['class' => 'form-control', 'placeholder' => "-- Set songs --"]) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/banners') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>
<script>
    $('.summernote').summernote({
        placeholder: 'Write your article here...',
        tabsize: 2,
        height: 100
    });
    $('.dropdown-toggle').dropdown();
</script>
{{-- <script>
    // Register plugins
    FilePond.registerPlugin(
      FilePondPluginFileValidateSize,
      FilePondPluginImagePreview,
    );
    FilePond.setOptions({
      server: {
        process: '/admin/upload/banner',
        revert: '/destroy',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      }
    });
    const inputElement = document.querySelector(`input[id="mainImage"]`);
    const pond = FilePond.create(inputElement, {
        forceRevert: true
    });
    for (let i = 0; i < 2; i++) {
    const inputElement = document.querySelector(`input[id="sideImage${i}"]`);
    const pond = FilePond.create(inputElement, {
      forceRevert: true
    });
  }
</script> --}}
<script>
    // prettier-ignore
    const mainImage = {!! json_encode($banner->image, JSON_HEX_TAG) !!};

        // Register plugins
        FilePond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginImagePreview,
        );
        FilePond.setOptions({
        server: {
            process: '/admin/upload/banner',
            revert: '/destroy',
            headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
        });

        // const inputElement = document.querySelector(`input[id="mainImage"]`);
        // const pond = FilePond.create(inputElement, {
        //     forceRevert: true
        // });

        // for (let i = 0; i < 2; i++) {
        //     const inputElement = document.querySelector(`input[id="sideImage${i}"]`);
        //     const pond = FilePond.create(inputElement, {
        //     forceRevert: true
        //     });
        // }

        const inputElementMainImage = document.querySelector('input[id="mainImage"]');
        const mainPond = FilePond.create(inputElementMainImage, {
        forceRevert: true,
        allowProcess: false,
        files: [{
        // the server file reference
        source: `{{asset('storage/${mainImage}')}}` || '',

        // set type to local to indicate an already uploaded file
        options: {

            // optional stub file information
            file: {
            name: `{{asset('storage/${mainImage}')}}`,
            size: `3001025`,
            type: 'image/png',
            },

            // pass poster property
            metadata: {
            poster: `{{asset('storage/${mainImage}')}}` || ''
            },
        },
        }],
    });
</script>
@endsection