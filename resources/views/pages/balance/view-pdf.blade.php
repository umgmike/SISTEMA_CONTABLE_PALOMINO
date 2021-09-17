<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BALANCE DE SITUACIÓN | SYS-JOHHAN</title>
    <style>
      caption 
        {     
          font-size: 16px;     
          font-weight: normal;     
          padding: 0.2rem;    
          background: #060302;
          border-top: 0px 
          solid #060302;   
          border-bottom: 0px 
          solid #060302; 
          color: #060302; 
          text-align: center;
        }

        table {
          border-collapse: collapse;
          margin: 22px;
        }

        .table {
          width: 100%;
          margin-bottom: 0rem;
          color: #212529;
          background-color: transparent;
        }

        .table th,
        .table td {
          padding: 0.75rem;
          vertical-align: top;
          border-top: 0px solid #dee2e6;
          padding: 0.3rem; /*Minimizar ancho de cada fila*/
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
          padding: 0.9rem;
        }

        .table-bordered {
          border: 1px solid #dee2e6; /*dar grueso a todo el contorno*/
        }

        .table-bordered th,
        .table-bordered td {
          border: 1px solid #dee2e6; /*Agrandar todas las lineas*/
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

      .page-break {
        page-break-after: always;
      }
    </style>

</head>

<body>

  <div>
    <caption style="text-align: left;"> NIT: {{ Auth::user()->nit }} </caption>
  </div>

  <div>
    <caption> EMPRESA: {{ Auth::user()->nombreEmpresa }} </caption>
    <caption> BALANCE DE SITUACIÓN </caption>
    <caption> Al {{ date('d') }} de {{ date('m') }} de {{ date('Y') }}</caption>
    <caption> (Cifras en quetzales.) </caption>
  </div>

  <div>

    <h4>
      <p><u><strong>ACTIVO</strong></u></p>
      <p><u>Activo corriente</u></p>
    </h4>

    <table class="table">
      <tbody>
        {{$total = 0 }}
        {{$total2 = 0 }}
        @foreach($partida as $balance)
          <tr>
            <td>{{ $balance->codigo }} - {{ $balance->cuenta }}</td>
            <td style="text-align: right;">{{ number_format( $balance->debe ),2 }}</td>
            <td style="text-align: right;">{{ number_format( $balance->haber ),2 }}</td>
          </tr>
        @endforeach
      </tbody>

      <tfoot>
        <tr>
          <th scope="col" class="txt-center"><strong>TOTAL ACTIVO CORRIENTE</strong></th>
          <th scope="col" style="text-align: right;">{{ number_format($balance->debe),2 }}</th>
          <th scope="col" style="text-align: right;">{{ number_format(0),2 }}</th>
        </tr>
      </tfoot>
      {{ $total = $total + $balance->debe }}
      {{ $total2 = $total2 + $balance->haber }}

    </table>


  </div>



  <script type="text/php">
    if ( isset($pdf) ) {
      $pdf->page_script('
      $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
      $pdf->text(220, 810, "Balance General | SYS-JOHHAN, Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
      ');
    }

  </script>

</body>
</html>