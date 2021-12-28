@extends('includes/cms-header', ['activePage' => 'webinar'])

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
              <a href="{{ route('admin.webinar.index') }}">Webinars</a>
            </li>
            <li class="breadcrumb-item active">
              Edit webinar {{$webinar->name}}
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
            Edit webinar {{$webinar->name}}
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
        <form action="{{ url('cms/webinar/update/' . $webinar->id)}}" method="post" id="createForm" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama webinar" name="name" autocomplete="off" value="{{$webinar->name}}">
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
                  <input type="text" class="form-control" placeholder="Deskripsi webinar" name="description" autocomplete="off" value="{{$webinar->description}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Jadwal (Masukan dalam format: Hari, Tanggal Bulan Tahun Jam Mulai - Jam Berakhir. Contoh : Senin, 30 Agustus 2021 17.00 - 18.00)</label>
                  <input type="text" class="form-control" placeholder="Jadwal webinar" name="schedule" autocomplete="off" value="{{$webinar->schedule}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Kontak Person (Contoh : Mas Caleb (081234567890))</label>
                  <input type="text" class="form-control" placeholder="Kontak person webinar" name="contactPerson" autocomplete="off" value="{{$webinar->contact_person}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>URL</label>
                  <input type="text" class="form-control" placeholder="Link webinar" name="url" autocomplete="off" value="{{$webinar->url}}">
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
        schedule: {
          required: true,
        },
        contactPerson: {
          required: true,
        },
        url: {
          required: true,
        }
      },
      messages: {
        name: {
          required: "Harap isi nama webinar",
        },
        description: {
          required: "Harap isi deskripsi webinar",
        },
        schedule: {
          required: "Harap isi jadwal webinar",
        },
        contactPerson: {
          required: "Harap isi kontak person webinar",
        },
        url: {
          required: "Harap isi url  webinar",
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
@endsection