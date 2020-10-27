@extends('layouts.main')

@section('content')
<div class="authbox">
    @if(!empty($rows))
    <div class="title">Lista de medicamentos</div>
    @foreach ($rows as $row)
    <div id="row" class="rows" data-rowId={{ $row -> id }}>
        <p id="name" class="text"> {{ $row -> Nombre }}</p>
        <?php
        $link = 'edit/' . $row -> id;
        ?>
        <button id="edit" class="btn" onclick="window.location='{{ url($link) }}'">Edit</button>
        <button id="delete" class="btn">Del</button>
    </div>
    <div class="information">
        <?php
        $msg = createMsg($row->Dias);
        ?>
        Tomar {{ $row -> Cantidad }} de {{ $row -> Nombre }} todos los {{ $msg }} cada {{ $row -> Franja_Horas }} hora(s).
    </div>
    @endforeach
    @endif
    <div class="redirect" id="caja_salida"><a style="text-decoration: none; color: #888;" href="{{ url('/')}}">Click aquí para volver al formulario</a></div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.information').hide();

        $('.rows #delete').click(function() {
            let id = $(this).parent().attr('data-rowId');  // Eliminar la row con este id.
            if (confirm("Seguro que quieres eliminar?")) {
                $.ajax({
                    url: "{{ route('list.removerow') }}",
                    method: "get",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // Recarga al eliminar para ver cambios
                        window.location.href="{{ url('list') }}";
                    }
                });
            }
            else {
                return false;
            }
        });

        $('.text').click(function() {
            $(this).parent().next('.information').slideToggle().siblings('.information').slideUp();
        });
    });
</script>
@endsection

<?php
function createMsg($string)
{
    $dayArray = str_split($string, 1);
    $array = array();
    foreach ($dayArray as $day) { /* Sacar los dias de la array */
        switch ($day) {
            case 1: array_push($array, "lunes"); break;
            case 2: array_push($array, "martes"); break;
            case 3: array_push($array, "miercoles"); break;
            case 4: array_push($array, "jueves"); break;
            case 5: array_push($array, "viernes"); break;
            case 6: array_push($array, "sabado"); break;
            case 7: array_push($array, "domingo"); break;
        }
    }
    if (sizeof($array) > 1) {
        $lastDay = array_pop($array);
        $msg = join(', ', $array) . ' y ' . $lastDay;
    } else {
        $msg = join(', ', $array);
    }
    return $msg;
}
?>