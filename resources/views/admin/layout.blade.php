<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Synema Worship CMS">
    <title>!nema Apps</title>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" ) }} rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href={{ asset("admin/assets/plugins/simplebar/simplebar.css") }} rel="stylesheet" />
    <link href={{ asset("admin/assets/plugins/nprogress/nprogress.css") }} rel="stylesheet" />
    <!-- No Extra plugin used -->
    <link href={{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }} rel='stylesheet'>
    <link href={{ asset('assets/plugins/daterangepicker/daterangepicker.css') }} rel='stylesheet'>
    <!-- Summernote -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href={{ asset('assets/plugins/toastr/toastr.min.css') }} rel='stylesheet'>

    <link href='{{ asset('assets/plugins/data-tables/datatables.bootstrap4.min.css') }}' rel='stylesheet'>
    <link href='{{ asset('assets/plugins/data-tables/responsive.datatables.min.css') }}' rel='stylesheet'>
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href={{ asset("admin/assets/css/sleek.css") }} />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />
    <!-- FAVICON -->
    <link href={{ asset("admin/assets/img/favicon.png") }} rel="shortcut icon" /> 
    <!-- Get FilePond and FilePond image preview plugin styles from a CDN -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
/>
    <!--
        HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src= {{ asset("https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js") }}></script>
        <script src= {{ asset("https://oss.maxcdn.com/respond/1.4.2/respond.min.js") }}></script>
        <![endif]-->
    <script src={{ asset("admin/assets/plugins/nprogress/nprogress.js") }}></script>
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();

    </script>

    <div id="toaster"></div>

    <!-- ====================================
        ????????? WRAPPER
        ===================================== -->
    <div class="wrapper">

        <!-- Github Link -->
        {{-- <a href="https://github.com/tafcoder/sleek-dashboard" target="_blank" class="github-link">
            <svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
                <defs>
                    <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
            </svg>
            <i class="mdi mdi-github-circle"></i>
        </a> --}}




        <!-- ====================================
              ????????? LEFT SIDEBAR WITH OUT FOOTER
            ===================================== -->
        @include('admin.partials.sidebar')


        <!-- ====================================
            ????????? PAGE WRAPPER
            ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            @include('admin.partials.header')

            <!-- ====================================
              ????????? CONTENT WRAPPER
              ===================================== -->
            <div class="content-wrapper">
                @yield('content')
            </div> <!-- End Content Wrapper -->


            <!-- Footer -->
            @include('admin.partials.footer')

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->


    <!-- <script type="module">
          import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
    
          const el = document.createElement('pwa-update');
          document.body.appendChild(el);
        </script> -->

    <!-- Javascript -->
    <script src={{ asset('assets/plugins/jquery/jquery.min.js') }}></script>
    <script src={{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/plugins/simplebar/simplebar.min.js') }}></script>
    <script src={{ asset('assets/plugins/charts/Chart.min.js') }}></script>
    <script src={{ asset('assets/js/chart.js') }}></script>
    <script src={{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}></script>
    <script src={{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}></script>
    <script src={{ asset('assets/js/vector-map.js') }}></script>
    <script src={{ asset('assets/plugins/daterangepicker/moment.min.js') }}></script>
    <script src={{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}></script>
    <script src={{ asset('assets/js/date-range.js') }}></script>
    <script src={{ asset('assets/plugins/toastr/toastr.min.js') }}></script>
    <script src={{ asset('assets/plugins/data-tables/jquery.datatables.min.js') }}></script>
    <script src={{ asset('assets/plugins/data-tables/datatables.bootstrap4.min.js') }}></script>
    <script src={{ asset('assets/plugins/data-tables/datatables.responsive.min.js') }}></script>
    <script src={{ asset("admin/assets/js/sleek.js") }}></script>
    <link href="assets/options/optionswitch.css" rel="stylesheet">
    <script src={{ asset("admin/assets/options/optionswitcher.js") }}></script>
    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Babel polyfill, contains Promise -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.6.15/browser-polyfill.min.js"></script>
    <!-- Get FilePond polyfills from the CDN -->
    <script src="https://unpkg.com/filepond-polyfill/dist/filepond-polyfill.js"></script>
    <!-- Get FilePond JavaScript and its plugins from the CDN -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    @yield('javascript')
</body>

</html>
