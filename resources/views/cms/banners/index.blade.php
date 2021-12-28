@extends('includes/cms-header', ['activePage' => 'banner'])

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @include('includes.flash-message')
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="{{ route('admin.banner.create') }}" class="btn btn-primary"> Tambah Banner </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Banner</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Halaman Banner</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($banners as $banner)
                  <tr>
                    <td width="20%">{{$banner->name}}</td>
                    <td>
                      <a href="{{ asset('storage/'.$banner->image)}}" data-toggle="lightbox" data-title="{{$banner->name.($loop->index+1)}}" data-gallery="gallery">
                        <img src="{{ asset('storage/'.$banner->image)}}" class="img-fluid mb-2" alt="white sample" style="max-width: 200px;"/>
                      </a>
                    </td>
                    
                    @if ($banner->name == 'products' or $banner->name == 'products-2')
                      <td colspan="2">
                        <a href="{{ url('cms/banner/edit/' . $banner->id) }}" class="btn btn-primary"> Edit </a>
                      </td>
                    @else
                      @if ($countMainslide < 4 )
                      <td>
                        <a href="{{ url('cms/banner/edit/' . $banner->id) }}" class="btn btn-primary"> Edit </a>
                      </td> 
                      @else   
                      <td>
                        <a href="{{ url('cms/banner/edit/' . $banner->id) }}" class="btn btn-primary"> Edit </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-delete-{{$banner->id}}">
                          Hapus
                        </button>
                      </td>
                      @endif
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@foreach($banners as $banner)
  <div class="modal fade" id="modal-delete-{{$banner->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Banner: {{$banner->id}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda ingin menghapus banner {{$banner->name}}</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <form action="{{ url('cms/banner/destroy/')}}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="id" value="{{$banner->id}}">
            <button type="submit" class="btn btn-primary">Ya</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endforeach
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