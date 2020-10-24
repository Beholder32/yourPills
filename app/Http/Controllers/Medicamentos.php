<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imputs;

class Medicamentos extends Controller
{
    function save(Request $req){
        // print_r($req->input());
        $imput=new Imputs;
        /* echo $req -> nombre;
        echo $req -> cantidad;
        echo '----';
        echo $day;
        echo '----';
        echo $req -> horas; */
        $imput -> Nombre = $req -> nombre;
        $imput -> Cantidad = $req -> cantidad;

        $day = $req -> lunes;
        $day .= $req -> martes;
        $day .= $req -> miercoles;
        $day .= $req -> jueves;
        $day .= $req -> viernes;
        $day .= $req -> sabado;
        $day .= $req -> domingo;  // Genero detecto todas las checkbox seleccionadas y las uno.

        $imput -> Dias = $day;
        $imput -> Franja_Horas = $req -> horas;
        $imput -> save();  // Guardo todos los elementos en una row de la Base de Datos.
    }

    public function index() {
        $rows = \App\Imputs::all();  // Sacamos todas las rows de la base de datos definida en el Model `Imputs`.
        return view('list', compact('rows'));  // Se lo pasamos a la view `list.blade.php`.
    }
}
