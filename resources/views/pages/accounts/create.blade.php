|@extends('pages.layouts.layout')

@section('Title')
  Crear cuentas
@endsection

@section("scripts")
<script src="{{asset("assets/pages/account/account.js")}}" type="text/javascript"></script>
@endsection

@section('content')

@section('nombre_ruta', 'Crear cuentas | SYS-JOHHAN')
@section('dashboard_nombre', 'Crear asientos contable')
@section('dashboard_ruta', route('page.asiento-create'))
@include('pages.navbar.button_a')

@include('includes.form-error')
@include('includes.mensaje')

<div class="container">
    <div class="row">
    	<div class="col-12 col-lg-5 offset-1">
            <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                <div class="post-content">

		            <div class="card-header">
		                <small style="font-size:30px;  color:black">
		                    <strong>Clasificaciones</strong><br>
		                </small>
		            </div>

		            <div class="card-body">
		                <div class="ribbon-wrapper ribbon-xl">
		                    <div class="ribbon bg-gray-light">Create class</div>
		                </div>
		            </div>

	                <form action="{{ route('page.save-nat') }}" id="GuardarNaturaleza" method="POST" autocomplete="off">
	                	@csrf
	                    <div class="card-body">
	                        @include('pages.accounts.naturaleza')
	                        <div class="text-center">
	                            <button type="submit" class="btn btn-success mt-40 btn-bg " aria-hidden="true"> Guardar naturaleza</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                <div class="post-content">

		            <div class="card-header">
		                <small style="font-size:30px;  color:black">
		                    <strong>Cuentas contables</strong><br>
		                </small>
		            </div>

		            <div class="card-body">
		                <div class="ribbon-wrapper ribbon-xl">
		                    <div class="ribbon bg-gray-light">Create accounts</div>
		                </div>
		            </div>

	                <form action="{{ route('page.save-acco') }}" id="GuardarAccount" method="POST" autocomplete="off">
	                	@csrf
	                    <div class="card-body">
	                        @include('pages.accounts.cuenta')
	                        <div class="text-center">
	                            <button type="submit" class="btn btn-primary mt-40 btn-bg " aria-hidden="true"> Guardar cuenta</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('uza_scripts')
<script src="{{asset("assets/pages/account/accounts.js")}}" type="text/javascript"></script>
@endsection

@section('footer_scripts')
<script type="text/javascript">

	$("#Activos").hide();


	function ShowSelected(){
		$("#Activos").show();

		var cod  = document.getElementById("id_cors").value;
		var cod1 = document.getElementById("id_categoria").value;
		var cod2 = document.getElementById("id_categoria_cuenta").value;

		if (cod == 1 && cod1 == 1 && cod2 == 2) {
			document.getElementById("codigoCuenta").value = 11100;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 1 && $item->id_categoria == 1 && $item->id_categoria_cuenta == 2)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 2 && cod1 == 1 && cod2 == 2) {
			document.getElementById("codigoCuenta").value = 11200;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 2 && $item->id_categoria == 1 && $item->id_categoria_cuenta == 2)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 3 && cod1 == 1 && cod2 == 1) {
			document.getElementById("codigoCuenta").value = 12300;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 3 && $item->id_categoria == 1 && $item->id_categoria_cuenta == 1)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 4 && cod1 == 1 && cod2 == 1) {
			document.getElementById("codigoCuenta").value = 12400;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 4 && $item->id_categoria == 1 && $item->id_categoria_cuenta == 1)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 5 && cod1 == 1 && cod2 == 1) {
			document.getElementById("codigoCuenta").value = 12500;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 5 && $item->id_categoria == 1 && $item->id_categoria_cuenta == 1)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 6 && cod1 == 1 && cod2 == 1) {
			document.getElementById("codigoCuenta").value = 12600;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 6 && $item->id_categoria == 1 && $item->id_categoria_cuenta == 1)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 7 && cod1 == 1 && cod2 == 1) {
			document.getElementById("codigoCuenta").value = 12700;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 7 && $item->id_categoria == 1 && $item->id_categoria_cuenta == 1)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 8 && cod1 == 2 && cod2 == 2) {
			document.getElementById("codigoCuenta").value = 21000;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 8 && $item->id_categoria == 2 && $item->id_categoria_cuenta == 2)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 9 && cod1 == 2 && cod2 == 1) {
			document.getElementById("codigoCuenta").value = 22000;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 9 && $item->id_categoria == 2 && $item->id_categoria_cuenta == 1)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  00001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 10 && cod1 == 3 && cod2 == 3) {
			document.getElementById("codigoCuenta").value = 3100;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 10 && $item->id_categoria == 3 && $item->id_categoria_cuenta == 3)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 11 && cod1 == 3 && cod2 == 3) {
			document.getElementById("codigoCuenta").value = 320;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 11 && $item->id_categoria == 3 && $item->id_categoria_cuenta == 3)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 12 && cod1 == 4 && cod2 == 4) {
			document.getElementById("codigoCuenta").value = 410;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 12 && $item->id_categoria == 4 && $item->id_categoria_cuenta == 4)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 13 && cod1 == 4 && cod2 == 4) {
			document.getElementById("codigoCuenta").value = 4200;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 13 && $item->id_categoria == 4 && $item->id_categoria_cuenta == 4)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 14 && cod1 == 4 && cod2 == 4) {
			document.getElementById("codigoCuenta").value = 4300;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 14 && $item->id_categoria == 4 && $item->id_categoria_cuenta == 4)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}


		else if (cod == 16 && cod1 == 5 && cod2 == 5) {
			document.getElementById("codigoCuenta").value = 510300;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 16 && $item->id_categoria == 5 && $item->id_categoria_cuenta == 5)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  000001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 17 && cod1 == 5 && cod2 == 5) {
			document.getElementById("codigoCuenta").value = 5104;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 17 && $item->id_categoria == 5 && $item->id_categoria_cuenta == 5)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 18 && cod1 == 6 && cod2 == 6) {
			document.getElementById("codigoCuenta").value = 6100;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 18 && $item->id_categoria == 6 && $item->id_categoria_cuenta == 6)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 19 && cod1 == 6 && cod2 == 6) {
			document.getElementById("codigoCuenta").value = 611400;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 19 && $item->id_categoria == 6 && $item->id_categoria_cuenta == 6)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  000001 }};
					@endif
				@endforeach
			@endif
		}


		else if (cod == 21 && cod1 == 6 && cod2 == 6) {
			document.getElementById("codigoCuenta").value = 611800;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 21 && $item->id_categoria == 6 && $item->id_categoria_cuenta == 6)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  000001 }};
					@endif
				@endforeach
			@endif
		}


		else if (cod == 22 && cod1 == 6 && cod2 == 6) {
			document.getElementById("codigoCuenta").value = 6119;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 22 && $item->id_categoria == 6 && $item->id_categoria_cuenta == 6)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 23 && cod1 == 6 && cod2 == 6) {
			document.getElementById("codigoCuenta").value = 6200;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 23 && $item->id_categoria == 6 && $item->id_categoria_cuenta == 6)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 24 && cod1 == 7 && cod2 == 7) {
			document.getElementById("codigoCuenta").value = 7100;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 24 && $item->id_categoria == 7 && $item->id_categoria_cuenta == 7)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 25 && cod1 == 8 && cod2 == 8) {
			document.getElementById("codigoCuenta").value = 8100;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 25 && $item->id_categoria == 8 && $item->id_categoria_cuenta == 8)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}

		else if (cod == 26 && cod1 == 9 && cod2 == 9) {
			document.getElementById("codigoCuenta").value = 9100;
			@if (count($accounts_a))
				@foreach ($accounts_a as $item)
					@if ($item->id_cors == 26 && $item->id_categoria == 9 && $item->id_categoria_cuenta == 9)
						document.getElementById("codigoCuenta").value = {{ $item->codigoCuenta +=  0001 }};
					@endif
				@endforeach
			@endif
		}
	}
</script>
@endsection
