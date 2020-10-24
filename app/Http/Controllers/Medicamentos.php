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
        $day .= $req -> domingo;

        $imput -> Dias = $day;
        $imput -> Franja_Horas = $req -> horas;
        $imput -> save();

        return redirect('/');
    }
}
