<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <link href="css/pdf.css" rel="stylesheet">
    <title></title>
    <style>

    </style>
</head>

<body>
    <header class="headerPdf">
        <h2>Icreai, mas alla de tu imaginación</h2>
    </header>
    <h3>{{$fechaPdf}}</h3>
    <h1>Cadáver exquisito</h1>
    @if($generoPdf->count())

    @foreach($generoPdf as $g)

    <h2>Genero: {{$g->name}} </h2>

    @endforeach

    @endif
    <hr>
    <div class="contenidoPdf break-word">
        @if($escritoPdf->count())

        @foreach($escritoPdf as $escrito)

        <p>{{$escrito->texto}}</p>

        @endforeach
        @else

        <h3 colspan="8"> SORRY, No hay registros todavia TwT!!</h3>

        @endif
    </div>
    <footer class="footerPdf">
        <h4 class="textRight">noreply.icreai@gmail.com</h4>
    </footer>
    <!-- <div class="saltarPag">
    </div>
    -->
    <script type="text/php">
        if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
	</script>

</body>

</html>