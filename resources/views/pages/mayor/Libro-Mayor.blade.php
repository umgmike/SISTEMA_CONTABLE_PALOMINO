<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LIBRO MAYOR | SYS-JOHHAN</title>
    <style>

	    caption 
	    {     
	      font-size: 15px;     
	      font-weight: normal;     
	      padding: 0px;    
	      background: #060302;
	      border-top: 4px 
	      solid #060302;   
	      border-bottom: 1px 
	      solid #060302; 
	      color: #060302; 
	      text-align: center;
	    }

	    table {
	      border-collapse: collapse;
	    }

	    .table {
	      width: 100%;
	      margin-bottom: 1rem;
	      color: #212529;
	      background-color: transparent;
	      font-size: 14px;
	      margin-right: 50px;
	      margin-left: 50px;
	    }

	    .table th,
	    .table td {
	      padding: 0.75rem;
	      vertical-align: top;
	      border-top: 1px solid #dee2e6;
	      padding: 0.5rem;
	    }

	    .table thead th {
	      vertical-align: bottom;
	      border-bottom: 2px solid #dee2e6;
	    }

	    .table tbody + tbody {
	      border-top: 2px solid #dee2e6;
	    }

	    .table-sm th,
	    .table-sm td {
	      padding: 0.3rem;
	    }

	    .table-bordered {
	      border: 1px solid #dee2e6;
	    }

	    .table-bordered th,
	    .table-bordered td {
	      border: 1px solid #dee2e6;
	    }

	    .table-bordered thead th,
	    .table-bordered thead td {
	      border-bottom-width: 2px;
	    }

	    .table-borderless th,
	    .table-borderless td,
	    .table-borderless thead th,
	    .table-borderless tbody + tbody {
	      border: 0;
	    }

	    .table-striped tbody tr:nth-of-type(odd) {
	      background-color: rgba(0, 0, 0, 0.05);
	    }

	    .table-hover tbody tr:hover {
	      color: #212529;
	      background-color: rgba(0, 0, 0, 0.075);
	    }

	    th {
	      text-align: inherit;
	    }

	    .table-responsive {
	      display: block;
	      width: 100%;
	      overflow-x: auto;
	      -webkit-overflow-scrolling: touch;
	    }

	    .table-responsive > .table-bordered {
	      border: 0;
	    }
    </style>
</head>

<body>
  	<div>
		<caption>LIBRO MAYOR</caption>
		<caption>(Cifras en quetzales.)</caption>
		<caption>Hora y fecha : {{ date('d-m-Y') }}</caption><br>

	    <table class="table table-bordered table-striped">
		  	<thead>
			    <tr>
			    	<th scope="col" class="txt-center">#</th>
			    	<th scope="col" class="txt-center">Naturaleza</th>
			        <th scope="col" class="txt-center">Cuenta</th>
			        <th scope="col" style="text-align: right;">Debe</th>
			        <th scope="col" style="text-align: right;">Haber</th>
			        <th scope="col" style="text-align: right;">Deudor</th>
			        <th scope="col" style="text-align: right;">Acreedor</th>
			    </tr>
		  	</thead>

		  	<tbody>
			  	@foreach($Deudor as $item)
			        <tr>
			            <td>{{$item->id}}</td>
			            <td>{{$item->naturaleza}}</td>
			            <td>{{$item->cuenta}}</td>
			            <td style="text-align: right;">{{ number_format($item->debe,2) }}</td>
			            <td style="text-align: right;">{{ number_format($item->haber,2) }}</td>
			            <td style="text-align: right;">{{ number_format($item->sumaDebe,2) }}</td>
			            <td style="text-align: right;">{{ number_format($item->sumaHaber,2) }}</td>
			        </tr>
			    @endforeach
		  	</tbody>
		  	<tfoot>
		        <tr>
		        	<th scope="col" class="txt-center"></th>
		          	<th scope="col" class="txt-center"></th>
			        <th scope="col" style="text-align: right;">Totales : </th>
			        <th scope="col" style="text-align: right;">{{ number_format($totalDebe,2) }}</th>
			        <th scope="col" style="text-align: right;">{{ number_format($totalHaber,2) }}</th>
			        <th scope="col" style="text-align: right;">{{ number_format($totalDeudor,2) }}</th>
			        <th scope="col" style="text-align: right;">{{ number_format($totalAcreedor,2) }}</th>
		        </tr>
		    </tfoot>
		</table>
	</div>

	<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
          $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
          $pdf->text(370, 570, "Libro Mayor | SYS-JOHHAN,  Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
      }
  	</script>

</body>
</html>