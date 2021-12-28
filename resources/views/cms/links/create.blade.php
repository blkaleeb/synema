@extends('includes/cms-header', ['activePage' => 'links'])

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
              <a href="{{ route('admin.links.index') }}">Links</a>
            </li>
            <li class="breadcrumb-item active">
              Tambah Page
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
            Tambah links baru
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
        <form action="{{ route('admin.link.store')}}" method="post" id="createForm">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Page</label>
                  <input type="text" class="form-control" placeholder="Halaman yang dituju" name="name" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Meta_description</label>
                  <input type="text" class="form-control" placeholder="Meta description" name="description" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Meta_keywords</label>
                  <input type="text" class="form-control" placeholder="Meta keywords" name="keywords" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Script (Pixels,Google, dll)</label>
                  <textarea class="form-control" placeholder="Type script.." id="script" name="script" style="height: 100px"></textarea>
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
        },
        description: {
          required: true,
        },
        keywords: {
          required: true,
        },
      },
      messages: {
        name: {
          required: "Harap isi nama page",
        },
        description: {
          required: "Harap isi meta description",
        },
        keywords: {
          required: "Harap isi meta keywords",
        },
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
@endsection