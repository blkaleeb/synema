@extends('includes/cms-header', ['activePage' => 'product'])

@section('container')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.product.index') }}">Products</a>
            </li>
            <li class="breadcrumb-item active">Detail Produk</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Produk</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12">

                  <h4>Nama</h4>
                  <div class="post">
                    <p>{{$product->name}}</p>
                  </div>

                  <h4>Kategori</h4>
                  <div class="post">
                    @if (isset($product->category->name))
                      <p>{{$product->category->name}}</p>
                    @else
                      <p style="color: red;">Belum masuk ke kategori apapun</p>
                    @endif
                  </div>

                  <h4>Subtitle</h4>
                  <div class="post clearfix">
                    <p>{{$product->subtitle}}</p>
                  </div>
                  
                  <h4>Harga</h4>
                  <div class="post clearfix">
                    <p>{{$product->price}}</p>
                  </div>

                  <h4>Harga setelah diskon</h4>
                  <div class="post clearfix">
                    <p>{{$product->price_after_discount}}</p>
                  </div>

                  <h4>Deskripsi</h4>
                  <div class="post clearfix">
                    <p>{!! $product->description !!}</p>
                  </div>

                  <h4>Spesifikasi</h4>
                  <div class="post clearfix">
                    <p>{!! $product->specification !!}</p>
                  </div>

                  <h4>Gambar</h4>
                  <div class="post clearfix">
                    <div class="row">
                      @foreach($product->images as $images)
                      <div class="col-sm-2">
                        <a href="{{ asset('storage/'.$images->image)}}" data-toggle="lightbox" data-title="{{$product->name.($loop->index+1)}}" data-gallery="gallery">
                          <img src="{{ asset('storage/'.$images->image)}}" class="img-fluid mb-2" alt="white sample" />
                        </a>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')
<script>
  $(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({
      gutterPixels: 3
    });
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
@endsection