@extends('includes/cms-header', ['activePage' => 'product'])

@section('container')
<div class="content-wrapper">
  <section class="content-header">
    @include('includes.flash-message')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.product.index') }}">Products</a>
            </li>
            <li class="breadcrumb-item active">
              Tambah Produk
            </li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">
            Tambah produk baru
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
        <form class="form-validate-summernote" action="{{ route('admin.product.store')}}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Nama produk" name="name" autocomplete="off" required="required" data-msg="Harap isi nama produk" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control select2" style="width: 100%;" name="productCategory">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                @for ($i = 0; $i < 1; $i++)
                  <div class="form-group">
                    <label>Gambar Utama</label>
                    <input type="file" name="images[]" id="createImage{{$i}}">
                  </div>
                @endfor
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Harga produk</label>
                  <input type="text" class="form-control" placeholder="Harga produk sebelum diskon" name="price" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Harga produk setelah diskon (jika tidak ada diskon, bisa dikosongkan)</label>
                  <input type="text" class="form-control" placeholder="Harga produk setelah diskon (jika tidak ada diskon, bisa dikosongkan)" name="priceAfterDiscount" autocomplete="off">
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
                  <input type="text" class="form-control" placeholder="Subtitle produk" name="subtitle" autocomplete="off">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="summernote" required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" data-msg="Harap isi Deskripsi Produk" id="description" name="description"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Spesifikasi</label>
                  <textarea class="summernote" placeholder="Spesifikasi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="specification" required="required" data-msg="Harap isi Spesifikasi Produk" id="specification"></textarea>
                </div>
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
    var specificationSummernote = $('#specification');

    var summernoteValidator = createForm.validate({
      errorElement: "span",
      errorClass: 'is-invalid',
      validClass: 'is-valid',
      ignore: ':hidden:not(.summernote),.note-editable.card-block',
      rules: {
        name: {
          required: true,
        },
        productCategory: {
          required: true
        },
        price: {
          required: true,
          number: true
        },
        priceAfterDiscount: {
          number: true
        },
        subtitle: {
          required: true,
        }
      },
      messages: {
        name: {
          required: "Harap isi nama produk",
        },
        productCategory: {
          required: "Harap isi kategori produk",
        },
        price: {
          required: "Harap isi harga produk",
          number: "Hanya diperbolehkan mengisi angka"
        },
        priceAfterDiscount: {
          number: "Hanya diperbolehkan mengisi angka"
        },
        subtitle: {
          required: "Harap isi subtitle produk",
        }
      },
      errorPlacement: function(error, element) {
        // Add the `help-block` class to the error element
        error.addClass("invalid-feedback");
        console.log(element);
        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.siblings("label"));
        } else if (element.hasClass("summernote")) {
          error.insertAfter(element.siblings(".note-editor"));
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

    specificationSummernote.summernote({
      fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24'],
      toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
      ],
      height: 300,
      callbacks: {
        onChange: function(contents, $editable) {
          specificationSummernote.val(specificationSummernote.summernote('isEmpty') ? "" : contents);
          summernoteValidator.element(specificationSummernote);
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
      process: '/cms/upload/product',
      revert: '/destroy',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    }
  })
  for (let i = 0; i < 1; i++) {
    const inputElement = document.querySelector(`input[id="createImage${i}"]`);
    const pond = FilePond.create(inputElement, {
      forceRevert: true,
      allowProcess: false,
    });
  }
</script>
@endsection