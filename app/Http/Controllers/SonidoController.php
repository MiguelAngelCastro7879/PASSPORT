<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SonidoController extends Controller
{
    public function datos(Request $request){
        
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/fermurilllo/feeds/sonido/data');

        $datos=json_decode($response);
        
        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);

        
    }

    public function ultimoDato(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/fermurilllo/feeds/sonido/data/last');

        $datos=json_decode($response);

        return  response()->json($datos,200);
    }
}
