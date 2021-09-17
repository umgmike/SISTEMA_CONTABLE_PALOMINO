<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Nomenclatura de importadora épocas | OFICINA CONTABLE PALOMINO</title>
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
          margin: 11px;
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
    <caption> Nomenclatura de importadora épocas </caption>
    <caption> {{ date('Y') }}</caption>
  </div>


  <div>
    <table class="table">
      <thead>
        <tr>
          <th>1 ACTIVO</th>
        </tr>
        <tr>
          <th>11 NO CORRIENTE</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report as $item)
          <tr>
            @if ($item->codigoCuenta == 111 || $item->codigoCuenta == 112)
              <td><strong>{{ $item->codigoCuenta }} {{ ' - ' }} {{ $item->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item->codigoCuenta }} {{ ' - ' }} {{ $item->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div><br>


  <div>
    <table class="table">
      <thead>
        <tr>
          <th>12  CORRIENTE</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report1 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 123 || $item1->codigoCuenta == 124 || $item1->codigoCuenta == 125 || $item1->codigoCuenta == 126 || $item1->codigoCuenta == 127)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

<br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>2  PASIVO</th>
        </tr>
        <tr>
          <th>21 NO CORRIENTE</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report2 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 2101)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>22 CORRIENTE</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report3 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 2201)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>3 CAPITAL</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report4 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 31 || $item1->codigoCuenta == 32)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>4 INGRESOS NETOS</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report5 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 41 || $item1->codigoCuenta == 42 || $item1->codigoCuenta == 43)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

    <br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>5 COSTO DE VENTAS</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report6 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 51 || $item1->codigoCuenta == 5103 || $item1->codigoCuenta == 5104)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>6 GASTOS DE OPERACIÓN</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report7 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 61 || $item1->codigoCuenta == 6114 || $item1->codigoCuenta == 6115 || $item1->codigoCuenta == 6118 || $item1->codigoCuenta == 6119 || $item1->codigoCuenta == 62)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>7 PRODUCTOS</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report8 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 71)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


    <br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>8 GASTOS FINANCIEROS</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report9 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 81)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

      <br>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th>9 GASTOS NO DEDUCIBLES</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report10 as $item1)
          <tr>
            @if ($item1->codigoCuenta == 91)
              <td><strong>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</strong></td>
            @else
              <td>{{ $item1->codigoCuenta }} {{ ' - ' }} {{ $item1->nombreCuenta }}</td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <script type="text/php">
    if ( isset($pdf) ) {
      $pdf->page_script('
      $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
      $pdf->text(220, 810, "Nomenclatura de importadora épocas | OFICINA CONTABLE PALOMINO, Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
      ');
    }

  </script>

</body>
</html>