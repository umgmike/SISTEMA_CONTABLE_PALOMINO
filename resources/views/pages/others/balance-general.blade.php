<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BALANCE GENERAL | SYS-JOHHAN</title>
    <style>
        body {
            margin: 1.5cm 1.5cm 1.5cm;
        }

        table {
            border: 0;
        }

        .table {
            width: 100%;
            border: 0;
            color: #212529;
            background-color: transparent;
            font-size: 12px;
        }

        .table th,
        .table td {
            border: 0;
            padding: 0.75rem;
            vertical-align: top;
            padding: 0.3rem;
        }

        .table thead th {
            vertical-align: bottom;
            border: 0;
        }

        .table tbody+tbody {
            border: 0;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
            border: 0;
        }

        .table-bordered {
            border: 0;
        }

        .table-bordered th,
        .table-bordered td {
            border: 0;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
            border: 0;
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
            border: 0;
        }

        .table-responsive {
            border: 0;
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
            font-family: Arial;
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
            {{ $contador2 = sizeof($partidaBalance) }}
            <thead class="thead-dark|thead-light">
                <tr>
                    <th>ACTIVO</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>NO CORRIENTE</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <thead class="thead-dark|thead-light">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidaBalance as $item)
                    {{ $contador++ }}
                    @if ($item->Total > 0 && $item->condicion == 1)
                        <tr>
                            <td>{{ $item->nombreCuenta }}</td>
                            <td></td>
                            <td style="text-align: right;">{{ number_format($item->Total, 2) }}</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tbody>





            <thead class="thead-dark|thead-light">
                <tr>
                    <th>CORRIENTE</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <thead class="thead-dark|thead-light">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidaBalance2 as $item)
                    {{ $contador++ }}
                    @if ($item->Total > 0 && $item->condicion == 1)
                        <tr>
                            <td>{{ $item->nombre_cta_padre }}</td>
                            <td></td>
                            <td style="text-align: right;">{{ number_format($item->Total, 2) }}</td>
                        </tr>
                    @endif
                @endforeach

                @foreach ($inventory as $inv)
                    {{ $contador++ }}
                    @if ($inv->Total > 0 && $inv->condicion == 1)
                        <tr>
                            <td>{{ $inv->cuentaNombre }}</td>
                            <td></td>
                            <td style="text-align: right;">{{ number_format($inv->Total, 2) }}</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td> <strong>SUMA EL ACTIVO</strong></td>
                    <td></td>
                    <td style="text-align: right;">
                        <h4><span>Q.
                                {{ number_format($subtotalBalance2 + $TotalInventory + $subtotalBalance, 2) }}</span>
                        </h4>
                    </td>
                </tr>

            </tbody>


            @foreach ($partidaPatrimonio as $pP)
            @endforeach



            <thead class="thead-dark|thead-light">
                {{ $totalUtilidad = $sumaDeVentasLocales - ($costoDeVentas - $TotalInventory) - $sumaGastosDeOperacion - $gastosNoDeducibles - $pagosMensualesISR }}
                {{ $TotalFinal = $pP->Total + $totalUtilidad }}
                <tr>
                    <th>CAPITAL</th>
                    <th></th>
                    <th style="text-align: right;">{{ number_format($pP->Total + $totalUtilidad, 2) }}</th>
                </tr>
            </thead>
            <thead class="thead-dark|thead-light">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidaPatrimonio as $pP)
                    {{ $contador++ }}
                    @if ($pP->Total > 0 && $pP->condicion == 1)
                        <tr>
                            <td>{{ $pP->nombreCuenta }}</td>
                            <td style="text-align: right;">{{ number_format($pP->Total, 2) }}</td>
                            <td></td>
                        </tr>

                    @endif
                @endforeach

                {{ $totalUtilidad = $sumaDeVentasLocales - ($costoDeVentas - $TotalInventory) - $sumaGastosDeOperacion - $gastosNoDeducibles - $pagosMensualesISR }}

                <tr>
                    <td>UTILIDAD DEL EJERCICIO</td>
                    <td style="text-align: right;">{{ number_format($totalUtilidad, 2) }}</td>
                    <td></td>
                </tr>
            </tbody>






            <thead class="thead-dark|thead-light">
                {{ $iva = $totalDiference - $totalDiference1 }}
                <tr>
                    <th>PASIVO</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>CORRIENTE</th>
                    <th></th>
                    <th style="text-align: right;">Q. {{ number_format($totalPasivoCorriente + $iva, 2) }}</th>
                </tr>
            </thead>
            <thead class="thead-dark|thead-light">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidaPasivo as $item)
                    {{ $contador++ }}
                    @if ($item->Total > 0 && $item->condicion == 1)
                        <tr>
                            <td>{{ $item->nombreCuenta }}</td>
                            <td style="text-align: right;">{{ number_format($item->Total, 2) }}</td>
                            <td style="text-align: right;"></td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td>Impuesto al Valor Agregado</td>
                    <td style="text-align: right;">{{ number_format($iva, 2) }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td> <strong>SUMA EL PASIVO Y CAPITAL</strong></td>
                    <td></td>
                    <td style="text-align: right;">
                        <h4><span>Q.
                                {{ number_format($totalPasivoCorriente + $iva + $TotalFinal, 2) }}</span>
                        </h4>
                    </td>
                </tr>
            </tbody>

        </table>

    </div>



    <div>
        <br>

        <input type="text"
            value="Guatemala, {{ date('d') }} de {{ date('M') }} del {{ date('Y') }}"></label>
        <br>


        <p style="text-align: justify;">
            El Infrascrito Contador Registrado bajo el Nº 556740-8 en la Superintendencia de Administración Tributaria
            CERTIFICA: Que todos los datos del Estado que anteceden fueron tomados de los registros contables de la
            Empresa Arriba indicada, los cuales son llevados de acuerdo a Normas Internacionales de Contabilidad y
            cumple con todos los requisitos legales.
        </p><br><br><br>

        <div style="text-align: left">(f)</div>
        <div style="text-align: left">{{ Auth::user()->nombrePropietario }}</div>

    </div>

    @foreach ($asiento as $a)
    @endforeach

    <script type="text/php">
        if ( isset($pdf) ) {
        $pdf->page_script('
        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
        $pdf->text(270, 17, "{{ Auth::user()->nombreEmpresa }}", $font, 12);
        $pdf->text(210, 29, "{{ Auth::user()->nombrePropietario }}", $font, 12);
        $pdf->text(250, 42, "Balance General", $font, 12);
        $pdf->text(230, 55, "Al {{ $a->fechaf }} DEL {{ Auth::user()->AnyoContable }}", $font, 12);
        $pdf->text(78, 17, "Nit: {{ Auth::user()->nit }}", $font, 12);
        $pdf->text(440, 17, "Folio: $PAGE_NUM", $font, 12);
        ');

      }
    </script>

</body>

</html>
