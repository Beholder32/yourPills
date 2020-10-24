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

    <form action="submit" method="POST" class="authbox">
        @csrf
        <div class="title">Usuario</div>
        <div class="subTitle">Introduce los datos del medicamento</div>
        <h5 class="inputType">Nombre</h5>
        <input class="input" type="text" name="nombre" maxlength="45" required>
        <h5 class="inputType">Cantidad de unidades</h5>
        <input class="input" type="text" name="cantidad" oninput="this.value = onlyInt(this.value)" required>
        <h5 class="inputType">Dias de consumo</h5>
        <div class="checkboxDate">
            <ul class="list">
                <li class="list-item">
                    <h5>Lunes</h5>
                    <input type="checkbox" name="lunes" value="1">
                </li>
                <li class="list-item">
                    <h5>Martes</h5>
                    <input type="checkbox" name="martes" value="2">
                </li>
                <li class="list-item">
                    <h5>Miercoles</h5>
                    <input type="checkbox" name="miercoles" value="3">
                </li>
                <li class="list-item">
                    <h5>Jueves</h5>
                    <input type="checkbox" name="jueves" value="4">
                </li>
                <li class="list-item">
                    <h5>Viernes</h5>
                    <input type="checkbox" name="viernes" value="5">
                </li>
                <li class="list-item">
                    <h5>Sabado</h5>
                    <input type="checkbox" name="sabado" value="6">
                </li>
                <li class="list-item">
                    <h5>Domingo</h5>
                    <input type="checkbox" name="domingo" value="7">
                </li>
            </ul>
        </div>
        <h5 class="inputType">Franja horaria (Cada cuantas horas)</h5>
        <input class="input" type="text" name="horas" oninput="this.value = onlyInt(this.value)" required>
        <br><br><br>
        <div class="buttonContents">
            <input type="submit" value="Cargar" class="submitButton">
        </div>
        <div id="caja_salida"></div>

    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.submitButton').click(function() {
                checked = $("input[type=checkbox]:checked").length;

                if (!checked) {
                    alert("Debes seleccionar al menos 1 checkbox.");
                    return false;
                }

            });
        });
    </script>

</body>

</html>