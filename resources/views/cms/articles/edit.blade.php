@extends('includes/cms-header', ['activePage' => 'article'])

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
              <a href="{{ route('admin.article.index') }}">Article</a>
            </li>
            <li class="breadcrumb-item active">
              Edit artikel {{$article->name}}
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
            Edit artikel {{$article->name}}
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
        <form action="{{ url('cms/article/update/' . $article->id)}}" method="post" id="createForm" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" placeholder="Judul artikel" name="title" autocomplete="off" value="{{$article->title}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Subtitle</label>
                  <input type="text" class="form-control" placeholder="Subtitle artikel" name="subtitle" autocomplete="off" value="{{$article->subtitle}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control select2" style="width: 100%;" name="articleCategory" id="select2Cat">
                  @foreach($categories as $category)
                    @if(isset($article->category->id) && $article->category->id == $category->id)
                      <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                    @else
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                  @endforeach
                  </select>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Gambar Utama</label>
                  <input type="file" name="images[]" id="mainImage">
                  <input type="hidden" name="hiddenMainImage" value="{{$article->main_image}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Subtitle</label>
                  <input type="text" class="form-control" placeholder="Subtitle artikel" name="subtitle" autocomplete="off" value="{{$article->subtitle}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="summernote" placeholder="Deskripsi artikel" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description" required="required" data-msg="Harap isi deskripsi artikel" id="description">{{$article->description}}</textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Keuntungan</label>
                  <textarea class="summernote" placeholder="keuntungan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="benefits" required="required" data-msg="Harap isi keuntungan artikel" id="benefits">{{$article->benefits}}</textarea>
                </div>
              </div>
              <!-- /.col -->
            </div> <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Kesimpulan</label>
                  <textarea class="summernote" placeholder="Kesimpulan artikel" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="conclusion" required="required" data-msg="Harap isi kesimpulan artikel" id="conclusion">{{$article->conclusion}}</textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Tags</label>
                  <select class="select2" multiple="multiple"  style="width: 100%;" name="tags[]" id="select2Tag">
                    @foreach($tags as $tag)
                      <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- /.col -->
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
$(function() {
    var createForm = $('.form-validate-summernote');
    var descriptionSummernote = $('#description');
    var benefitsSummernote = $('#benefits');
    var conclusionSummernote = $('#conclusion');

    var summernoteValidator = createForm.validate({
      errorElement: "span",
      errorClass: 'is-invalid',
      validClass: 'is-valid',
      ignore: ':hidden:not(.summernote),.note-editable.card-block',
      rules: {
        title: {
          required: true,
        },
        articleCategory: {
          required: true
        },
        subtitle: {
          required: true,
        },
        'images[0]': {
          required: true
        }
      },
      messages: {
        title: {
          required: "Harap isi judul artikel",
        },
        articleCategory: {
          required: "Harap isi kategori artikel",
        },
        subtitle: {
          required: "Harap isi subtitle artikel",
        },
        'images[0]': {
          required: "Harap isi gambar artikel"
        }
      },
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback");
        console.log(element);

        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.siblings("label"));
        } else if (element.hasClass("summernote")) {
          error.insertAfter(element.siblings(".note-editor"));
        } else if (element.prop("type") === "file") {
          element.closest(".form-group").append(error);
        } else {
          error.insertAfter(element);
        }
      }
    });

    descriptionSummernote.summernote({
      callbacks: {
        onChange: function(contents, $editable) {
          descriptionSummernote.val(descriptionSummernote.summernote('isEmpty') ? "" : contents);
          summernoteValidator.element(descriptionSummernote);
        }
      }
    });

    benefitsSummernote.summernote({
      fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24'],
      toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
      ],
      height: 300,
      callbacks: {
        onChange: function(contents, $editable) {
          benefitsSummernote.val(benefitsSummernote.summernote('isEmpty') ? "" : contents);
          summernoteValidator.element(benefitsSummernote);
        },
        onImageUpload: function(data) {
          data.pop();
        }
      }
    });

    conclusionSummernote.summernote({
      fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24'],
      toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
      ],
      height: 300,
      callbacks: {
        onChange: function(contents, $editable) {
          conclusionSummernote.val(conclusionSummernote.summernote('isEmpty') ? "" : contents);
          summernoteValidator.element(conclusionSummernote);
        },
        onImageUpload: function(data) {
          data.pop();
        }
      }
    });

    $('.note-editable').css('font-size', '16px');
    $('.note-editable').css('font-family', 'sans-serif');
    $('.note-editable').css('line-height', '24px');
    $('.note-editable').css('color', '#303442');
  });
$(document).ready(function() {
  $.validator.setDefaults({
    submitHandler: function(form) {
      form.submit();
    },
  });
  $("#createForm").validate({
    rules: {
      title: {
        required: true,
      },
      articleCategory: {
        required: true
      },
      subtitle: {
        required: true,
      },
      description: {
        required: true,
      },
      benefits: {
        required: true
      }
    },
    messages: {
      title: {
        required: "Harap isi judul artikel",
      },
      articleCategory: {
        required: "Harap isi kategori artikel",
      },
      subtitle: {
        required: "Harap isi subtitle artikel",
      },
      description: {
        required: "Harap isi deskripsi artikel",
      },
      benefits: {
        required: "Harap isi keuntungan artikel",
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
  const mainImage = {!! json_encode($article->main_image, JSON_HEX_TAG) !!};
  const firstImage = {!! json_encode($article->first_image, JSON_HEX_TAG) !!};
  const secondImage = {!! json_encode($article->second_image, JSON_HEX_TAG) !!};

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
      process: '/cms/upload/articles',
      revert: '/destroy',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
    }
  })

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

  const inputElementFirstImage = document.querySelector(`input[id="firstImage"]`);
  const secondPond = FilePond.create(inputElementFirstImage, {
    forceRevert: true,
    allowProcess: false,
    files: [{
      // the server file reference
      source: `{{asset('storage/${firstImage}')}}` || '',

      // set type to local to indicate an already uploaded file
      options: {

        // optional stub file information
        file: {
          name: `{{asset('storage/${firstImage}')}}`,
          size: `3001025`,
          type: 'image/png',
        },

        // pass poster property
        metadata: {
          poster: `{{asset('storage/${firstImage}')}}` || ''
        },
      },
    }],
  });

  const inputElementSecondImage = document.querySelector(`input[id="secondImage"]`);
  const thirtPond = FilePond.create(inputElementSecondImage, {
    forceRevert: true,
    allowProcess: false,
    files: [{
      // the server file reference
      source: `{{asset('storage/${secondImage}')}}` || '',

      // set type to local to indicate an already uploaded file
      options: {

        // optional stub file information
        file: {
          name: `{{asset('storage/${secondImage}')}}`,
          size: `3001025`,
          type: 'image/png',
        },

        // pass poster property
        metadata: {
          poster: `{{asset('storage/${secondImage}')}}` || ''
        },
      },
    }],
  });

</script>
@endsection