<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index()
    {   
        $response = Http::withHeaders([
            'key' => '15ac67380e09fc7c60e816d684b5d713'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];
        return view('ongkir',['cities'=> $cities, 'ongkir'=>'']);
    }

    public function cekOngkir(Request $request)
    {

        $responseCost = Http::withHeaders([
            'key' => '15ac67380e09fc7c60e816d684b5d713'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ]);
        $ongkir = $responseCost['rajaongkir'];
        return view('hasil',[ 'ongkir'=> $ongkir]);


    }
}
