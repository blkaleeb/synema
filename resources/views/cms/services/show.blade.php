@extends('includes/cms-header', ['activePage' => 'service'])

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
            <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Services</a></li>
            <li class="breadcrumb-item active">Detail Layanan</li>
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
          <h3 class="card-title">Detail Layanan</h3>

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
                    <p>{{$service->name}}</p>
                  </div>

                  <h4>Kategori</h4>
                  <div class="post">
                    @if (isset($service->category->name))
                      <p>{{$service->category->name}}</p>
                    @else
                      <p style="color: red;">Belum masuk ke kategori apapun</p>
                    @endif
                  </div>
                  
                  <h4>Gambar Utama</h4>
                  <div class="post clearfix">
                    <div class="row">
                      <div class="col-sm-2">
                        <a href="{{ asset('storage/'.$service->main_image)}}" data-toggle="lightbox" data-title="Gambar utama" data-gallery="gallery">
                          <img src="{{ asset('storage/'.$service->main_image)}}" class="img-fluid mb-2" alt="gambar utama" />
                        </a>
                      </div>
                      <div class="col-sm-2">
                        <a href="{{ asset('storage/'.$service->first_image)}}" data-toggle="lightbox" data-title="Gambar kedua" data-gallery="gallery">
                          <img src="{{ asset('storage/'.$service->first_image)}}" class="img-fluid mb-2" alt="gambar kedua" />
                        </a>
                      </div>
                      <div class="col-sm-2">
                        <a href="{{ asset('storage/'.$service->second_image)}}" data-toggle="lightbox" data-title="Gambar ketiga" data-gallery="gallery">
                          <img src="{{ asset('storage/'.$service->second_image)}}" class="img-fluid mb-2" alt="gambar ketiga" />
                        </a>
                      </div>
                    </div>
                  </div>

                  <h4>Title</h4>
                  <div class="post clearfix">
                    <p>{{$service->title}}</p>
                  </div>

                  <h4>Subtitle</h4>
                  <div class="post clearfix">
                    <p>{{$service->subtitle}}</p>
                  </div>

                  <h4>Deskripsi</h4>
                  <div class="post clearfix">
                    <p>{!! $service->description !!}</p>
                  </div>

                  <h4>Keuntungan layanan</h4>
                  <div class="post clearfix">
                    <p>{!! $service->benefits  !!}</p>
                  </div>

                  <h4>Kesimpulan</h4>
                  <div class="post clearfix">
                    <p>{!! $service->conclusion !!}</p>
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