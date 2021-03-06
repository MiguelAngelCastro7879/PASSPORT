<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Token;

class DhtController extends Controller
{
    
    public function datosTemperatura(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/fermurilllo/feeds/temperaturac/data');

        $datos=json_decode($response);
/*
        Teemperatura::create([
            "valor"=>$json->valor,
            "valor"=>$json->valor,
        ])*/
        //return $datos;
        
        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);

        
    }

    public function ultimoDatoTemperatura(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/fermurilllo/feeds/temperaturac/data/last');

        $datos=json_decode($response);

        return  response()->json($datos,200);
    }

}
