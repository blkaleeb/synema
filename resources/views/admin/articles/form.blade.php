@extends('admin.layout', ['activePage' => 'Article'])

@section('content')

@php
    $formTitle = !empty($articles) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Articles </h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($articles))
                        {!! Form::model($articles, ['url' => ['admin/articles', $articles->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/articles', 'enctype' => 'multipart/form-data']) !!}
                    @endif
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
                            {!! Form::label('category', 'Category') !!}
                            {!! Form::select('category', $categories, !empty(old('category')) ? old('category') : $categoryIDs, ['class' => 'form-control', 'placeholder' => "-- Set Category --"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'summernote', 'placeholder' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags', 'Tags') !!}
                            {!! Form::select('select2', $tags , null, ['class' => 'form-control select2', 'name' => 'tags[]', 'id' => 'select2Tag', 'data-placeholder' => "-- Set Tags --", 'multiple' => "multiple"]) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('admin/articles') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection

@section('javascript')
{{-- <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script> --}}
<script>
    $(function () {
      //Initialize Select2 Elements
      let select2Tag = $("#select2Tag").select2({
        placeholder : 'Pilih salah 1 tag',
        tags: true
      });
  
      const defaultVal = []
      const tags = {!! json_encode($selectedTag, JSON_HEX_TAG) !!};
  
      tags.forEach(tag => {
        defaultVal.push(tag?.tag_id)
      })
  
  
      defaultVal.forEach(value =>{
        if(!select2Tag.find('option:contains(' + value + ')').length) {
          select2Tag.append($('<option>'));
        }
      })
  
      select2Tag.val(defaultVal).trigger("change"); 
  
      $('#select2Tag').select2()
      $('#select2Cat').select2()
    })
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
        process: '/admin/upload/articles',
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
    const mainImage = {!! json_encode($articles->image, JSON_HEX_TAG) !!};

        // Register plugins
        FilePond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginImagePreview,
        );
        FilePond.setOptions({
        server: {
            process: '/admin/upload/articles',
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