<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imputs;

class Medicamentos extends Controller
{
    function save(Request $req){
        //print_r($req->input());
        $imput=new Imputs;
        $imput->Nombre=$req->nombre;
        $imput->Cantidad=$req->cantidad;
        $imput->Dias=$req->dias;
        $imput->Franja_Horas=$req->horas;
        echo $imput->save();
    }
}
