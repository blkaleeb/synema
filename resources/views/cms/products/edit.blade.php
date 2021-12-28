@extends('includes/cms-header', ['activePage' => 'product'])

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
              <a href="{{ route('admin.product.index') }}">Products</a>
            </li>
            <li class="breadcrumb-item active">
              Edit produk {{$product->name}}
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
            Edit produk {{$product->name}}
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
        <form action="{{ url('cms/product/update/' . $product->id)}}" method="post" id="createForm" enctype="multipart/form-data">
          @csrf
          {{ method_field('PUT') }}
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama produk" name="name" autocomplete="off" value="{{$product->name}}">
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
                @if (isset ($product->images[$i]->image))
                  @php
                    $imageVal = $product->images[$i]->image
                  @endphp
                @else
                  @php
                    $imageVal = null
                  @endphp
                @endif
                <!-- text input -->
                <div class="form-group">
                  <label>Gambar Utama</label>
                  <input type="file" name="images[]" id="editImage{{$i}}" value="{{$imageVal}}">
                </div>
              </div>
              @endfor
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control select2" style="width: 100%;" name="productCategory">
                  @foreach($categories as $category)
                    @if(isset($product->category->id) && $product->category->id == $category->id)
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
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Subtitle</label>
                  <input type="text" class="form-control" placeholder="Subtitle produk" name="subtitle" autocomplete="off" value="{{$product->subtitle}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Harga produk</label>
                  <input type="text" class="form-control" placeholder="Harga produk sebelum diskon" name="price" autocomplete="off" value="{{$product->price}}">
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Harga produk setelah diskon (jika tidak ada diskon, bisa dikosongkan)</label>
                  <input type="text" class="form-control" placeholder="Harga produk setelah diskon (jika tidak ada diskon, bisa dikosongkan)" name="priceAfterDiscount" autocomplete="off" value="{{$product->price_after_discount}}">
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
                  <textarea class="summernote" required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" data-msg="Harap isi Deskripsi Produk" id="description" name="description">{{$product->description}}</textarea>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Spesifikasi</label>
                  <textarea class="summernote" placeholder="Spesifikasi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="specification" required="required" data-msg="Harap isi Spesifikasi Produk" id="specification">{{$product->specification}}</textarea>
                </div>
              </div>
              <!-- /.col -->
            </div> <!-- /.row -->
            <div class="row">
              @php
              $imageVal = null
              @endphp
              @for ($i = 0; $i < 1; $i++) 
              <div class="col-sm-3">
                @if (isset ($product->images[$i]->image))
                @php
                $imageVal = $product->images[$i]->image
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
  // prettier-ignore
  const productImage = {!! json_encode($product->images->toArray(), JSON_HEX_TAG) !!};
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
      process: '/cms/upload/product',
      revert: '/destroy',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
    }
  })
  for (let i = 0; i < 1; i++) {
    const inputElement = document.querySelector(`input[id="editImage${i}"]`);
    if (productImage[i]) {
      const pond = FilePond.create(inputElement, 
      {
        forceRevert: true,
        allowProcess: false,
        files: [{
          // the server file reference
          source: `{{asset('storage/${productImage[i]?.image}')}}` || '',

          // set type to local to indicate an already uploaded file
          options: {

            // optional stub file information
            file: {
              name: `{{asset('storage/${productImage[i]?.image}')}}`,
              size: `3001025`,
              type: 'image/png',
            },

            // pass poster property
            metadata: {
              poster: `{{asset('storage/${productImage[i]?.image}')}}` || ''
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