@extends('admin.layout', ['activePage' => 'Songs'])

@section('content')

@php
    $formTitle = !empty($songs) ? 'Update' : 'New'    
@endphp
{{-- @dd($statuses) --}}
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
                            {!! Form::label('image', 'Image') !!}
                            <input type="file" name="thumbnail[0]" id="thumbnail">
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('group', 'Group') !!}
                            {!! Form::select('group', $group , null, ['class' => 'form-control', 'placeholder' => '-- Set Group --']) !!}
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
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'summernote', 'placeholder' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sound', 'Sound') !!}
                                <input type="file" name="images[0]" id="mainImage">
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

@section('javascript')
<script>
    $('.summernote').summernote({
        placeholder: 'Write your article here...',
        tabsize: 2,
        height: 100
    });
    $('.dropdown-toggle').dropdown();
</script>
<script>
  // Register plugins
  FilePond.registerPlugin(
    FilePondPluginFileValidateSize,
    FilePondPluginImagePreview,
  );
  FilePond.setOptions({
    server: {
      process: '/admin/upload/songs',
      revert: '/destroy',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    }
  })
  const inputElement = document.querySelector(`input[id="mainImage"]`);
  const pond = FilePond.create(inputElement, {
    forceRevert: true
  });
  const inputElement1 = document.querySelector(`input[id="thumbnail"]`);
  const pond1 = FilePond.create(inputElement1, {
    forceRevert: true
  });
</script>
@if(isset($songs))
<script>
  const tmpSong = "{{ $songs->song }}";
  if(tmpSong != "#"){
    const song = "http://127.0.0.1:8000/storage/"+"{{$songs->song}}";
    pond.files = [
        {
            source: song,
            options: {
                type: "local",
                metadata: {
                    poster: song,
                }
            }
        }
    ];
  }
  const tmpImg = "{{ $songs->image }}";
  if(tmpImg != ""){
    const img = "http://127.0.0.1:8000/storage/"+"{{$songs->image}}";
    pond1.server = {
        load: (source, load, error, progress, abort, headers) => {
            var myRequest = new Request(source);
            fetch(myRequest).then(function(response) {
              response.blob().then(function(myBlob) {
                load(myBlob)
              });
            });         
        },
    };
    pond1.files = [
        {
            source: img,
            options: {
                type: "local",
                metadata: {
                    poster: img,
                }
            }
        }
    ];
  }
</script>
@endif
@endsection