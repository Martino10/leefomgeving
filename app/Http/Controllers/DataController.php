<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    public function index() {
        // haal data tabel op via sql (query klopt nog niet helemaal)
        $dataquery = "SELECT l.id, l.naam, l.plaats, l.adres, ldr.value as ldr, temperatuur.value as temperatuur, gas.value as gas, luchtvochtigheid.value as luchtvochtigheid, geluid.value as geluid, ldr.gemeten_op 
        FROM locations l 
        INNER JOIN temperatuur ON l.id = temperatuur.location_id 
        INNER JOIN gas ON l.id = gas.location_id 
        INNER JOIN luchtvochtigheid ON l.id = luchtvochtigheid.location_id 
        INNER JOIN geluid ON l.id = geluid.location_id 
        INNER JOIN ldr ON l.id = ldr.location_id 
        ORDER BY ldr.gemeten_op;";

        // kolommen: id | naam | plaats | adres | ldr | temperatuur | gas | luchtvochtigheid | geluid | gemeten_op
        $data = DB::select($dataquery);
        return view('data', ['data' => $data]);
    }
}
