<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('Title','Welcome') | SYS-JOHHAN</title>

    <!-- Favicon -->
    <link rel="icon" href=" {{ asset('uza/img/core-img/favicon.ico') }} ">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href=" {{ asset('uza/style.css') }} ">

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <!-- Font Awesome -->

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset("assets/lte/plugins/select2/css/select2.min.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <style>
        .breakpoint-off .classynav ul li .dropdown {
            width: 410px;
        }

        .texto-custom{
            color: #343a40;
            font-size: 32px;
            font-family: "Lato", "Helvetica Neue", Cambria, sans-serif;
            font-weight: 700;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/style-johhan.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <!-- ***** Top Search Area Start ***** -->
    @include('pages.layouts.exitApp')
    <!-- ***** Top Search Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('rols.nav-bar')
    <!-- ***** Header Area End ***** -->


    <!-- ***** About Us Area Start ***** -->
    <section class="uza-about-us-area">
        <div style="padding-top: 100px;">
        </div>

        <div class="container">
                @yield('content')
        </div>
        <!-- About Background Pattern -->
        <div class="about-bg-pattern">
            <img src=" {{ asset('uza/img/core-img/curve-2.png') }} " alt="">
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->


    <!-- ***** Footer Area Start ***** -->
    @include('pages.layouts.footer')
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->

    <!-- jQuery js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js" integrity="sha512-ju6u+4bPX50JQmgU97YOGAXmRMrD9as4LE05PdC3qycsGQmjGlfm041azyB1VfCXpkpt1i9gqXCT6XuxhBJtKg==" crossorigin="anonymous"></script>

    <!-- jQuery js -->
    <script src=" {{ asset('uza/js/jquery.min.js') }} "></script>
    <!-- Popper js -->
    <script src=" {{ asset('uza/js/popper.min.js') }} "></script>
    <!-- Bootstrap js -->
    <script src=" {{ asset('uza/js/bootstrap.min.js') }} "></script>
    <!-- All js -->
    <script src=" {{ asset('uza/js/uza.bundle.js') }} "></script>
    <!-- Active js -->
    <script src=" {{ asset('uza/js/default-assets/active.js') }} "></script>

    <script src="{{ asset('assets/lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>

    <script src="{{ asset('assets/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset("assets/lte/plugins/select2/js/select2.full.min.js") }}"></script>

    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset("assets/lte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js") }}"></script>

    @yield('uza_scripts')

    <script type="text/javascript">
        $(function () {
          $('#TableStyle').DataTable({
            language: 
            {
                url: "{{asset('js/lan-es-datatable.json')}}"
            },
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "processing": true,
          });
        });
    </script>


    <script type="text/javascript">
        $(function () {
          $('#Accounts').DataTable({
            language: 
            {
                url: "{{asset('js/lan-es-datatable.json')}}"
            },
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "processing": true,
          });
        });
    </script>


    <script type="text/javascript">
        $(function () {
          $('#Detalle_vista').DataTable({
            language: 
            {
                url: "{{asset('js/lan-es-datatable.json')}}"
            },
            "paging": false,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "processing": true,
          });
        });
    </script>

    <script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
          $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function(){
          $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

      })
    </script>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    @yield("scriptsPlugins")
    <script src="{{ asset('assets/lte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/lte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset("assets/js/scripts.js")}}"></script>
    <script src="{{ asset("assets/js/funciones.js")}}"></script>
    @yield("scripts")

    @yield('footer_scripts')

</body>

</html>