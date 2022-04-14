<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    public function index() {
        // data tabel met alle metingen
        $dataquery = "SELECT l.id, l.naam, l.plaats, l.adres, ldr.value as ldr, temperatuur.value as temperatuur, gas.value as gas, luchtvochtigheid.value as luchtvochtigheid, geluid.value as geluid, qualityscore.value as qualityscore, ldr.gemeten_op 
        FROM locations l 
        INNER JOIN temperatuur ON l.id = temperatuur.location_id 
        INNER JOIN gas ON l.id = gas.location_id 
        INNER JOIN luchtvochtigheid ON l.id = luchtvochtigheid.location_id 
        INNER JOIN geluid ON l.id = geluid.location_id 
        INNER JOIN ldr ON l.id = ldr.location_id
        INNER JOIN qualityscore ON l.id = qualityscore.location_id
        WHERE ldr.id = temperatuur.id AND ldr.id = gas.id AND ldr.id = luchtvochtigheid.id AND ldr.id = geluid.id AND ldr.id = qualityscore.id
        ORDER BY ldr.gemeten_op;";

        // kolommen: id | naam | plaats | adres | ldr | temperatuur | gas | luchtvochtigheid | geluid | qualityscore | gemeten_op
        $data = DB::select($dataquery);

        // zorgt ervoor dat er maar één meting per locatie wordt getoond
        $id_array = array();
        for ($x = 0; $x < count($data); $x++) {
            for ($y = 0; $y < count($id_array); $y++) {
                if ($data[$x]->id = $id_array[$y]) {
                    unset($data[$x]);
                    break;
                }
            }
            array_push($id_array, $data[$x]->id);
        }
        return view('data', ['data' => $data]);
    }

    public function detaildata($location_name) {
        // data tabel met alle metingen van de locatie
        $locationdataquery = "SELECT l.id, l.naam, l.plaats, l.adres, ldr.value as ldr, temperatuur.value as temperatuur, gas.value as gas, luchtvochtigheid.value as luchtvochtigheid, geluid.value as geluid, qualityscore.value as qualityscore, ldr.gemeten_op 
        FROM locations l 
        INNER JOIN temperatuur ON l.id = temperatuur.location_id 
        INNER JOIN gas ON l.id = gas.location_id 
        INNER JOIN luchtvochtigheid ON l.id = luchtvochtigheid.location_id 
        INNER JOIN geluid ON l.id = geluid.location_id 
        INNER JOIN ldr ON l.id = ldr.location_id
        INNER JOIN qualityscore ON l.id = qualityscore.location_id
        WHERE ldr.id = temperatuur.id AND ldr.id = gas.id AND ldr.id = luchtvochtigheid.id AND ldr.id = geluid.id AND ldr.id = qualityscore.id AND l.naam = '$location_name'
        ORDER BY ldr.gemeten_op;";

        $locationdata = DB::select($locationdataquery);
        $location = DB::table('locations')->where('naam', '=', $location_name)->first();
        $summary = $locationdata[0];

        return view('detaildata', ['data' => $locationdata, 'location' => $location, 'summary' => $summary]);
    }
}
