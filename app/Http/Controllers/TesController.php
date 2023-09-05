<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TesController extends Controller
{
    public function prosesPerulangan(Request $request)
    {
        $input = $request->input;
        $message = [];
        $count = 0;

        for ($i = 1; $i < $input; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                array_push($message, ['Bage Concat ', $i]);
                $count++;
            } else {
                if ($i % 3 == 0) {
                    array_push($message, ['Bage ', $i]);
                } elseif ($i % 5 == 0) {
                    array_push($message, ['Concat ', $i]);
                }
            }

            if ($count == 5) {
                break;
            }
        }

        // dd($message);
        return redirect()->back()->with('message', $message);
    }

    public function indexRajaOngkir()
    {
        $apiKey = '06e5e57decee43825fd728de61c6045e';
        $response = Http::withHeaders([
            'key' => $apiKey,
        ])->get('https://api.rajaongkir.com/starter/city');

        $kota = $response['rajaongkir']['results'];

        return view('raja-ongkir', ['kota' => $kota]);
    }

    public function biayaRajaOngkir(Request $request)
    {
        $apiKey = '06e5e57decee43825fd728de61c6045e';

        $courier = ['jne', 'pos', 'tiki'];
        $responses = [];

        foreach ($courier as $value) {
            $response = Http::withHeaders([
                'key' => $apiKey,
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $request->origin,
                'destination' => $request->destination,
                'weight' => $request->weight,
                'courier' => $value,
            ]);

            $responses[] = $response['rajaongkir']['results'];
        }

        // dd($responses);

        return view('hasil', compact('responses'));
    }
}
