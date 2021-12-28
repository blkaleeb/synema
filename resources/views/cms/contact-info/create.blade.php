@extends('includes/cms-header', ['activePage' => 'contactInformation'])

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
              <a href="{{ route('admin.contactInformation.index') }}">Contact Info</a>
            </li>
            <li class="breadcrumb-item active">
              Tambah informasi kontak
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
            Tambah informasi kontak baru
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
        <form action="{{ route('admin.contactInformation.store')}}" method="post" id="createForm">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Nomor telepon 1</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nomor telepon 1" name="phoneNumber1" autocomplete="off">
                  </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Nomor telepon 2</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nomor telepon 2" name="phoneNumber2" autocomplete="off">
                  </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Nomor mobile 1</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nomor mobile 1" name="mobileNumber1" autocomplete="off">
                  </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Email 1</label>
                  <input type="text" class="form-control" placeholder="Email 1" name="email1" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Email 2</label>
                  <input type="text" class="form-control" placeholder="Email 2" name="email2" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Email 3</label>
                  <input type="text" class="form-control" placeholder="Email 3" name="email3" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Instagram (masukan full url)</label>
                  <input type="text" class="form-control" placeholder="https://www.instagram.com/instagram/" name="instagram" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Twitter (masukan full url)</label>
                  <input type="text" class="form-control" placeholder="https://twitter.com/elonmusk" name="twitter" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Facebook (masukan full url)</label>
                  <input type="text" class="form-control" placeholder="https://www.facebook.com/Cristiano" name="facebook" autocomplete="off">
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
        phoneNumber1: {
          required: true,
        },
        mobileNumber1: {
          required: true,
        },
        email1: {
          required: true,
          email: true,
        }
      },
      messages: {
        phoneNumber1: {
          required: "Harap isi nomor telepon 1",
        },
        mobileNumber1: {
          required: "Harap isi nomor mobile 1",
        },
        email1: {
          required: "Harap isi email 1",
          email: "Harap masukain email 1 dalam format email",
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