@extends('admin.layout', ['activePage' => 'Artists'])

@section('content')

@php
    $formTitle = !empty($artists) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} artists </h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($artists))
                        {!! Form::model($artists, ['url' => ['admin/artists', $artists->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/artists', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('image', 'Image') !!}
                            <div class="col-sm-6">
                                {!! Form::file('images[0]', ['id' => 'mainImage']) !!}
                            </div>
                            <input type="hidden" name="hiddenMainImage" value="{{$artists->image}}">
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('role', 'Role') !!}
                            {!! Form::text('role', null, ['class' => 'form-control', 'placeholder' => 'role']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'summernote', 'placeholder' => 'description']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/artists') }}" class="btn btn-secondary btn-default">Back</a>
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
<script>

    // prettier-ignore
  const mainImage = {!! json_encode($artists->image, JSON_HEX_TAG) !!};

    // Register plugins
    FilePond.registerPlugin(
      FilePondPluginFileValidateSize,
      FilePondPluginImagePreview,
    );
    FilePond.setOptions({
      server: {
        process: '/admin/upload/artists',
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