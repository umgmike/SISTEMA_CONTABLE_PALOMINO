<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ESTADO DE RESULTADOS | SYS-JOHHAN</title>
    <style>
        body {
            margin: 1.5cm 1.5cm 1.5cm;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
            font-size: 14px;
            border: 0;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border: 0;
            padding: 0.3rem;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 0px;
        }

        .table tbody+tbody {
            border-top: 0px;
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
        .table-borderless tbody+tbody {
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

        .table-responsive>.table-bordered {
            border: 0;
        }

        input {
            width: 300px;
            float: right;
            border: 0;
            margin-top: 1px;
            text-align: right;
            font-family: Arial
        }

        h4 {
            border-bottom: 1px solid black;
            padding-bottom: 3px;
        }

        h4>span {
            border-bottom: 1px solid black;
        }

    </style>

</head>

<body>

    <div>
        <table class="table">
            {{ $contador = 0 }}
            {{ $contador2 = sizeof($partida) }}

            <thead class="thead-dark|thead-light">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partida1 as $item)
                    {{ $contador++ }}
                    @if ($item->Total > 0 && $item->condicion == 1)
                        <tr>
                            <td>{{ $item->cuenta }}</td>
                            <td style="text-align: right;">{{ number_format($item->Total, 2) }}</td>
                    @endif
                @endforeach
                <td style="text-align: right;"><u> Q. {{ number_format($sumaDeVentasLocales, 2) }}</u></td>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tbody>




            <thead class="thead-dark|thead-light">
                <tr>
                    <th>COSTO DE VENTAS</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partida2 as $item1)
                    {{ $contador++ }}
                    @if ($item1->Total > 0 && $item1->condicion == 1)
                        <tr>
                            <td>{{ $item1->cuenta }}</td>
                            <td style="text-align: right;">{{ number_format($item1->Total, 2) }}</td>
                        </tr>
                    @endif
                @endforeach

                @foreach ($inventory as $inv)
                    {{ $contador++ }}
                    @if ($inv->Total > 0 && $inv->condicion == 1)
                        <tr>
                            <td>{{ $inv->cuentaNombre }}</td>
                            <td style="text-align: right;">{{ number_format($inv->Total, 2) }}</td>
                    @endif
                @endforeach
                <td style="text-align: right;"><u>Q.
                        {{ number_format($costoDeVentas - $TotalInventory, 2) }}</u></td>
                </tr>

                <tr>
                    <th>UTILIDAD BRUTA EN VENTAS </th>
                    <th></th>
                    <th style="text-align: right;">Q.
                        {{ number_format($sumaDeVentasLocales - ($costoDeVentas - $TotalInventory), 2) }}</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tbody>






            <thead class="thead-dark|thead-light">
                <tr>
                    <th>GASTOS DE OPERACION</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($partida as $i)
                    {{ $contador++ }}
                    @if ($i->Total > 0 && $i->condicion == 1)
                        <tr>
                            <td>{{ $i->cuenta }}</td>
                            <td style="text-align: right;">{{ number_format($i->Total, 2) }}</td>
                    @endif
                @endforeach
                <td style="text-align: right;"><u>Q. {{ number_format($sumaGastosDeOperacion, 2) }}</u></td>
                </tr>

                <tr>
                    <th> UTILIDAD EN OPERACIÓN </th>
                    <th></th>
                    <th style="text-align: right;">Q.
                        {{ number_format($sumaDeVentasLocales - ($costoDeVentas - $TotalInventory) - $sumaGastosDeOperacion, 2) }}
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tbody>




            <thead class="thead-dark|thead-light">
            <tbody>

                @foreach ($partida3 as $ii)
                    {{ $contador++ }}
                    @if ($ii->Total > 0 && $ii->condicion == 1)
                        <tr>
                            <td>{{ $ii->cuenta }}</td>
                            <td style="text-align: right;">{{ number_format($ii->Total, 2) }}</td>
                    @endif
                @endforeach
                <td style="text-align: right;"><u>Q. {{ number_format($gastosNoDeducibles, 2) }}</u></td>
                </tr>

                <tr>
                    <th> UTILIDAD NETA </th>
                    <th></th>
                    <th style="text-align: right;">Q.
                        {{ number_format($sumaDeVentasLocales - ($costoDeVentas - $TotalInventory) - $sumaGastosDeOperacion - $gastosNoDeducibles, 2) }}
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tbody>




            <thead class="thead-dark|thead-light">
            <tbody>

                @foreach ($partida4 as $iii)
                    {{ $contador++ }}
                    @if ($iii->Total > 0 && $iii->condicion == 1)
                        <tr>
                            <td>{{ $iii->cuenta }}</td>
                            <td style="text-align: right;">{{ number_format($iii->Total, 2) }}</td>
                    @endif
                @endforeach
                <td style="text-align: right;"><u>Q. {{ number_format($pagosMensualesISR, 2) }}</u></td>
                </tr>

                <tr>
                    <th>UTILIDAD DEL EJERCICIO </th>
                    <th></th>
                    <th style="text-align: right;">
                        <h4><span>Q.
                                {{ number_format($sumaDeVentasLocales - ($costoDeVentas - $TotalInventory) - $sumaGastosDeOperacion - $gastosNoDeducibles - $pagosMensualesISR, 2) }}</span>
                        </h4>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tbody>



        </table>

        <input type="text"
            value="Guatemala, {{ date('d') }} de {{ date('M') }} del {{ date('Y') }}"></label>
        <br>

        <p style="text-align: justify;">
            El Infrascrito Contador Registrado bajo el Nº 556740-8 en la Superintendencia de Administración Tributaria
            CERTIFICA: Que todos los datos del Estado que anteceden fueron tomados de los registros contables de la
            Empresa Arriba indicada, los cuales son llevados de acuerdo a Normas Internacionales de Contabilidad y
            cumple con todos los requisitos legales.
        </p><br><br>

        <div>(f)</div>
        <div>{{ Auth::user()->nombrePropietario }}</div>
    </div>




    @foreach ($asiento as $a)
    @endforeach

    <script type="text/php">
        if ( isset($pdf) ) {
        $pdf->page_script('
        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
        $pdf->text(270, 17, "{{ Auth::user()->nombreEmpresa }}", $font, 12);
        $pdf->text(210, 29, "{{ Auth::user()->nombrePropietario }}", $font, 12);
        $pdf->text(240, 42, "Estado de resultados", $font, 12);
        $pdf->text(230, 55, "Del 1°-01-{{ Auth::user()->AnyoContable }} Al  {{ $a->fechaf }}", $font, 12);
        $pdf->text(78, 17, "Nit: {{ Auth::user()->nit }}", $font, 12);
        $pdf->text(440, 17, "Folio: $PAGE_NUM", $font, 12);
        ');

      }
    </script>
</body>

</html>
