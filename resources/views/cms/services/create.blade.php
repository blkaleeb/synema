@extends('includes/cms-header', ['activePage' => 'service'])

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
              <a href="{{ route('admin.service.index') }}">Services</a>
            </li>
            <li class="breadcrumb-item active">
              Tambah layanan
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
            Tambah layanan baru
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

        <form class="form-validate-summernote" action="{{ route('admin.service.store')}}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama layanan" name="name" autocomplete="off">
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
                  <select class="form-control select2" style="width: 100%;" name="serviceCategory">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" placeholder="Title layanan" name="title" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Gambar Utama</label>
                  <input type="file" name="images[0]" id="mainImage">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Subtitle</label>
                  <input type="text" class="form-control" placeholder="Subtitle layanan" name="subtitle" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="summernote" required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" data-msg="Harap isi Deskripsi Layanan" name="description" id="description"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Keuntungan</label>
                  <textarea class="summernote" placeholder="Keuntungan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="benefits" required="required" data-msg="Harap isi Keuntungan Layanan" id="benefits"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Kesimpulan</label>
                  <textarea class="summernote" placeholder="Kesimpulan layanan" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="conclusion" id="conclusion" required="required" data-msg="Harap isi Kesimpulan Layanan"></textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
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
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
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
        name: {
          required: true,
        },
        serviceCategory: {
          required: true
        },
        title: {
          required: true
        },
        subtitle: {
          required: true
        },
        'images[0]': {
          required: true
        }
      },
      messages: {
        name: {
          required: "Harap isi nama layanan",
        },
        serviceCategory: {
          required: "Harap isi kategori layanan",
        },
        title: {
          required: "Harap isi title layanan",
        },
        subtitle: {
          required: "Harap isi subtitle layanan",
        },
        'images[0]': {
          required: "Harap isi gambar layanan"
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
</script>
<script>
  // Register plugins
  FilePond.registerPlugin(
    FilePondPluginFileValidateSize,
    FilePondPluginImagePreview,
  );
  FilePond.setOptions({
    server: {
      process: '/cms/upload/services',
      revert: '/destroy',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    }
  })
  const inputElement = document.querySelector(`input[id="mainImage"]`);
  const pond = FilePond.create(inputElement);

  for (let i = 0; i < 2; i++) {
    const inputElement = document.querySelector(`input[id="sideImage${i}"]`);
    const pond = FilePond.create(inputElement);
  }
</script>
@endsection