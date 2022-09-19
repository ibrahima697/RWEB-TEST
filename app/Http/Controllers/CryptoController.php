<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CryptoController extends Controller
{
    //
    public function index()
    {
        $cryptos = Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false')->json();
        //dd($cryptos)    ;
        return view('crypto', [
            'cryptos' => $cryptos
        ]);
    }
}
