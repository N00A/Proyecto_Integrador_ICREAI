<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>Icreai PDF</title>
    <link rel="shortcut icon" href="uploads/fondos/favicon.ico">
    <link href="css/pdf.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header class="headerPdf">
        <h2>Icreai, mas allá de tu imaginación</h2>
    </header>
    <div class="textCenter">
        <img width="160px" height="180px" src="uploads/fondos/logo brayan-02.png">
    </div><br><br>
    <div>
        {{$fechaPdf}}<br><br>

        <span class="tituloP">Cadáver exquisito</span><br>

        @if($generoPdf->count())

        @foreach($generoPdf as $g)

        <span class="tituloS">Genero: {{$g->name}}</span>

        @endforeach

        @endif
    </div>
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