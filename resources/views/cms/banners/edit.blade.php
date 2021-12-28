@extends('includes/cms-header', ['activePage' => 'banner'])

@section('container')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @include('includes.flash-message')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.banner.index') }}">Banners</a>
            </li>
            <li class="breadcrumb-item active">
              Edit banner {{$banner->name}}
            </li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            Edit banner {{$banner->name}}
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('cms/banner/update/' . $banner->id)}}" method="post" id="createForm" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Nama</label>
                  <select class="form-control" for="name" name="name" id="name">
                    <option value="mainslide" {{ $banner->name == "mainslide" ? 'selected' : '' }}>Main Slide</option>
                    <option value="products" {{ $banner->name == "products" ? 'selected' : '' }}>Banner Products</option>
                    <option value="products-2" {{ $banner->name == "products-2" ? 'selected' : '' }}>Banner Products - 2</option>
                  </select>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Subtitle</label>
                  <input type="text" class="form-control" placeholder="Subtitle banner" name="subtitle" autocomplete="off" value="{{$banner->subtitle}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" placeholder="Deskripsi banner" name="description" autocomplete="off" value="{{$banner->description}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              @php
              $imageVal = null
              @endphp
              @for ($i = 0; $i < 1; $i++) 
              <div class="col-sm-3">
                @if (isset ($banner->images[$i]->image))
                  @php
                    $imageVal = $banner->images[$i]->image
                  @endphp
                @else
                  @php
                    $imageVal = null
                  @endphp
                @endif
                <!-- text input -->
                <div class="form-group">
                  <label>Gambar {{$i+1}} {{$imageVal}}</label>
                  <input type="file" name="images[]" id="editImage{{$i}}" value="{{$imageVal}}">
                </div>
              </div>
              @endfor
            </div>
            <div class="row">
              @php
              $imageVal = null
              @endphp
              @for ($i = 0; $i < 1; $i++) 
              <div class="col-sm-3">
                @if (isset ($banner->images[$i]->image))
                @php
                $imageVal = $banner->images[$i]->image
                @endphp
                @else
                @php
                $imageVal = null
                @endphp
                @endif
                <!-- text input -->
                <div class="form-group">
                  <input type="hidden" name="hiddenImages[]" value="{{$imageVal}}">
                </div>
              </div>
              @endfor
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
</div>
<!-- /.content -->
@endsection

@section('javascript')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
  $(document).ready(function() {
    $.validator.setDefaults({
      submitHandler: function(form) {
        form.submit();
      },
    });
    $("#createForm").validate({
      rules: {
        name: {
          required: true,
        }
      },
      messages: {
        name: {
          required: "Harap isi nama banner",
        }
      },
      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid");
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
      },
    });
  });
</script>
<script>
  // prettier-ignore
  const bannerImage = {!! json_encode($banner->image, JSON_HEX_TAG) !!};

  const imagePath = []

  // Register plugins
  FilePond.registerPlugin(
    FilePondPluginFileValidateSize,
    FilePondPluginImageExifOrientation,
    FilePondPluginImageCrop,
    FilePondPluginImageResize,
    FilePondPluginImagePreview,
    FilePondPluginImageTransform,
    FilePondPluginFilePoster
  );
  FilePond.setOptions({
    server: {
      process: '/cms/upload/banner',
      revert: '/destroy',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
    }
  })
  for (let i = 0; i < 1; i++) {
    const inputElement = document.querySelector(`input[id="editImage${i}"]`);
    if (bannerImage[i]) {
      const pond = FilePond.create(inputElement, 
      {
        forceRevert: true,
        allowProcess: false,
        files: [{
          // the server file reference
          source: `{{asset('storage/${bannerImage}')}}` || '',

          // set type to local to indicate an already uploaded file
          options: {

            // optional stub file information
            file: {
              name: `{{asset('storage/${bannerImage}')}}`,
              size: `3001025`,
              type: 'image/png',
            },

            // pass poster property
            metadata: {
              poster: `{{asset('storage/${bannerImage}')}}` || ''
            },
          },
        }],
      });
    } else {
      const pond = FilePond.create(inputElement);
    }

    // $('.my-').on('FilePond:removefile', function(e) {
    //   console.log('file removed event', e);
    // });
  }
</script>
@endsection