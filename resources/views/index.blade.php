<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/estilos.css">
    <script src="../resources/js/programa.js"></script>
</head>

<body>

    <form action="submit" method="POST" class="authbox">
        @csrf
        <div class="title">Usuario</div>
        <div class="subTitle">Introduce los datos del medicamento</div>
        <h5 class="inputType">Nombre</h5>
        <input class="input" type="text" name="nombre" maxlength="45" required>
        <h5 class="inputType">Cantidad de unidades</h5>
        <input class="input" type="text" name="cantidad" required>
        <h5 class="inputType">Dias de consumo</h5>
        <input class="input" type="text" name="dias" required>
        <h5 class="inputType">Franja horaria</h5>
        <input class="input" type="text" name="horas" required>
        <br><br><br>
        <div class="buttonContents">
            <input type="submit" value="Cargar" class="submitButton">
        </div>
        <div id="caja_salida">
        </div>

    </form>

</body>

</html>