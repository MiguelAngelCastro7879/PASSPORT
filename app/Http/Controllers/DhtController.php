<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DhtController extends Controller
{
    public function datosTemperatura(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/MiguelAngel7879/feeds/temperatura/data');

        $datos=json_decode($response);

        //return $datos;
        
        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);

        
    }

    public function ultimoDatoTemperatura(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/MiguelAngel7879/feeds/temperatura/data/last');

        $datos=json_decode($response);

        return  response()->json($datos,200);
    }

    public function datosHumedad(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/MiguelAngel7879/feeds/humedad/data');

        $datos=json_decode($response);

        //return $datos;
        
        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);

        
    }

    public function ultimoDatoHumedad(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/MiguelAngel7879/feeds/humedad/data/last');

        $datos=json_decode($response);

        return  response()->json( $datos,200);
    }
}
