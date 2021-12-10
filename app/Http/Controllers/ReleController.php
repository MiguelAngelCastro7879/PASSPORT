<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReleController extends Controller
{
    public function datosR1(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/fermurilllo/feeds/relevador/data');

        $datos=json_decode($response);

        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);

    }


    public function ultimoDatoR1(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token

        ])->get('https://io.adafruit.com/api/v2/fermurilllo/feeds/relevador/data/last');

        $datos=json_decode($response);

        return  response()->json($datos,200);
    }


    public function controladorR1(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->post('https://io.adafruit.com/api/v2/fermurilllo/feeds/relevador/data',[

            'value'=>$request->value
        ]);

        $datos=json_decode($response);

        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);
    }

    public function datosR2(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->get('https://io.adafruit.com/api/v2/fermurilllo/feeds/relevador2/data');

        $datos=json_decode($response);

        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);

    }


    public function ultimoDatoR2(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token

        ])->get('https://io.adafruit.com/api/v2/fermurilllo/feeds/relevador2/data/last');

        $datos=json_decode($response);

        return  response()->json($datos,200);
    }


    public function controladorR2(Request $request){
        
        $response=Http::withHeaders(['X-AIO-key'=>$request->token


        ])->post('https://io.adafruit.com/api/v2/fermurilllo/feeds/relevador2/data',[

            'value'=>$request->value
        ]);

        $datos=json_decode($response);

        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);
    }
}
