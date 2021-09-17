<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ESTADO DE FLUJO DE EFECTIVO | SYS-JOHHAN</title>
    <style>

      body {
            margin: 1.5cm 1.5cm 1.5cm;
      }

      table {
        border-collapse: collapse;
      }

      .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: transparent;
        font-size: 11px;
      }

      .table th,
      .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        padding: 0.3rem;
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
  
  </div>


  <script type="text/php">
      if ( isset($pdf) ) {
        $pdf->page_script('
        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
        $pdf->text(270, 17, "{{ Auth::user()->nombreEmpresa }}", $font, 12);
        $pdf->text(210, 29, "{{ Auth::user()->nombrePropietario }}", $font, 12);
        $pdf->text(240, 42, "Estado de flujo de activo", $font, 12);
        $pdf->text(78, 17, "Nit: {{ Auth::user()->nit }}", $font, 12);
        $pdf->text(440, 17, "Folio: $PAGE_NUM", $font, 12);
        ');

      }
    </script>
  
</body>
</html>