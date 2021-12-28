@extends('includes/cms-header', ['activePage' => 'home'])

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @include('includes.flash-message')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$viewerProduct}}</h3>

                            <p>Jumlah Viewer Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer"></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            {{-- Kenaikan jumlah total view produk dibandingkan sebelumnya --}}
                            <h3><sup style="font-size: 20px">{{$viewPercentage}} %</sup></h3>
                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            {{-- Jumlah orang yang telah subscribe email --}}
                            <h3>{{$userSubscribed}}</h3>

                            <p>User Subscribed</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer"></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            {{-- Mengambil jumlah orang yang melakukan appointment --}}
                            <h3>{{$userAppointment}}</h3>

                            <p>Interest</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <a href="#" class="small-box-footer"></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="row">
                {{-- Appointment Info --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Newest Appointment
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Service</th>
                                        <th>Waktu</th>
                                        <th>Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Get 5 terbaru dari database --}}
                                    @foreach($appointments as $appointment)
                                    <tr>
                                        <td width="20%">{{$appointment->name}}</td>
                                        <td width="20%">{{$appointment->email}}</td>
                                        <td width="20%">{{$appointment->phone}}</td>
                                        <td width="20%">{{$appointment->address}}</td>
                                        <td width="20%">{{$appointment->service}}</td>
                                        <td width="20%">{{$appointment->date}}</td>
                                        <td width="20%">{{$appointment->message}}</td>
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

            <div class="row">
                {{-- Produk Dashboard --}}
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            Product Dashboard
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Jumlah View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Get 5 terbaru dari database --}}
                                    @foreach($products as $product)
                                    <tr>
                                        <td width="20%">{{$product->name}}</td>
                                        <td width="20%">{{$product->views}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                {{-- Hot Article --}}
                <div class="col-6">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{asset('images/box01-bg02-desktop - Copy.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            @if (isset($article))
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">Artikel ini menjadi artikel paling menarik dengan Views sebanyak <strong> {{$article->views}}</strong>!! </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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