<?php
function createMsg($string)
{
    $dayArray = str_split($string, 1);
    $array = array();
    foreach ($dayArray as $day) {
        switch ($day) {
            case 0: array_push($array, "domingo"); break;
            case 1: array_push($array, "lunes"); break;
            case 2: array_push($array, "martes"); break;
            case 3: array_push($array, "miercoles"); break;
            case 4: array_push($array, "jueves"); break;
            case 5: array_push($array, "viernes"); break;
            case 6: array_push($array, "sabado"); break;
        }
    }
    if (sizeof($array) > 1) {
        $lastDay = array_pop($array);
        $msg = join(', ', $array) . ' y ' . $lastDay;
    }
    else {
        $msg = join(', ', $array);
    }
    return $msg;
}
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Pills</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <div class="authbox">
        @if(!empty($rows))
        <div class="title">Lista de medicamentos</div>
        @foreach ($rows as $row)
        <p class="rows"> {{ $row -> Nombre }} </p>
        <div class="information">
            <?php
            $msg = createMsg($row->Dias);
            ?>
            Tomar {{ $row -> Cantidad }} de {{ $row -> Nombre }} todos los {{ $msg }} cada {{ $row -> Franja_Horas }} hora(s).
        </div>
        @endforeach
        @endif
        <div class="redirect" id="caja_salida"><a style="text-decoration: none; color: #888;" href="{{ url('/')}}">Click aqui para volver al formulario</a></div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.information').hide();
            $('.rows').click(function() {
                $(this).next('.information').slideToggle().siblings('.information').slideUp();
            });
        });
    </script>
</body>

</html>