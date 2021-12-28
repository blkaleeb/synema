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
              Tambah banner
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
            Tambah banner baru
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
        <form action="{{ route('admin.banner.store')}}" method="post" id="createForm">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label for="name">Nama</label>
                  <select class="form-control" for="name" name="name" id="name">
                    <option selected disabled>-- Pilih Banner --</option>
                    <option value="mainslide">Main Slide</option>
                    <option value="projects">Banner Projects</option>
                    <option value="projects-2">Banner Projects - 2</option>
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
                  <input type="text" class="form-control" placeholder="Subtitle banner" name="subtitle" autocomplete="off">
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
                  <input type="text" class="form-control" placeholder="Deskripsi banner" name="description" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              @for ($i = 0; $i < 1; $i++) <div class="col-sm-3">
                <!-- text input -->
                <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="images[]" id="createImage{{$i}}" required>
                </div>
            </div>
            @endfor
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
  })
</script>
<script>
  $(function() {
    // Summernote
    $(".textarea").summernote({
      fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24'],
      toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
      ],
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
  // Register plugins
  FilePond.registerPlugin(
    FilePondPluginFileValidateSize,
    FilePondPluginImagePreview,
  );
  FilePond.setOptions({
    server: {
      process: '/cms/upload/banner',
      revert: '/destroy',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    }
  })
  for (let i = 0; i < 10; i++) {
    const inputElement = document.querySelector(`input[id="createImage${i}"]`);
    const pond = FilePond.create(inputElement);
  }
</script>
@endsection