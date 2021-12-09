<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Token;

class PuertaController extends Controller
{
    public function datos(Request $request){
        
        $token = Token::getToken();
        $response=Http::withHeaders(['X-AIO-key'=>$token

        ])->get('https://io.adafruit.com/api/v2/MiguelAngel7879/feeds/led/data');

        $datos=json_decode($response);

        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);

    }


    public function ultimoDato(Request $request){
        
        $token = Token::getToken();
        $response=Http::withHeaders(['X-AIO-key'=>$token

        ])->get('https://io.adafruit.com/api/v2/MiguelAngel7879/feeds/led/data/last');

        $datos=json_decode($response);

        return  response()->json($datos,200);
    }


    public function controlador(Request $request){
        
        $token = Token::getToken();
        $response=Http::withHeaders(['X-AIO-key'=>$token


        ])->post('https://io.adafruit.com/api/v2/MiguelAngel7879/feeds/led/data',[

            'value'=>$request->value
        ]);

        $datos=json_decode($response);

        return  response()->json([
            'status' => 'ok',
            'datos' => $datos
        ],200);
    }

}
