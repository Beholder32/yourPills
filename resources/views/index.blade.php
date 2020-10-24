<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Your Pills</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>

    <form action="submit" method="POST" class="authbox" id="form">
        @csrf
        <div class="title">Usuario</div>
        <div class="subTitle">Introduce los datos del medicamento</div>
        <h5 class="inputType">Nombre</h5>
        <input class="input" type="text" name="nombre" maxlength="40" required>
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
                    <input type="checkbox" name="domingo" value="0">
                </li>
            </ul>
        </div>
        <h5 class="inputType">Franja horaria (Cada cuantas horas)</h5>
        <input class="input" type="text" name="horas" oninput="this.value = onlyIntAnd24(this.value)" required>
        <br><br><br>
        <div class="buttonContents">
            <input type="submit" value="Cargar" class="submitButton">
        </div>
        <div class="redirect" id="caja_salida"><a style="text-decoration: none; color: #888;" href="{{ url('list')}}">Click aqui para ver la lista</a></div>
        <?php echo csrf_field(); ?>
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
            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'submit',
                    type: 'post',
                    data: $('#form').serialize(),
                    cache: false,
                    success: function() {
                        let form = document.getElementById('form');
                        for (let i = 0; i < form.elements.length; i++) {
                            if (form.elements[i].type == 'checkbox') {
                                form.elements[i].checked = false;
                            }
                            else if (form.elements[i].type != 'submit' && form.elements[i].type != 'hidden') {
                                form.elements[i].value = '';
                                form.elements[i].selectedIndex = 0;
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>