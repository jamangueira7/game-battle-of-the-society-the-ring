<?php

namespace App\Http\Controllers;

use App\Personage;
use App\Weapons;
use Illuminate\Http\Request;

class Game extends Controller
{
    //
    public function index()
    {
        $personages = Personage::all()->where('hero','=',true);
        $ever = Personage::all();
        $weapons = Weapons::all();

        return view('game.index',[
            'personages' =>$personages,
            'ever' =>$ever,
            'weapons' =>$weapons
        ]);
    }

    public function hero(Request $request)
    {
        dd($request);
        $personages = Personage::all()->where('hero','=',true);
        return view('game.index',[
            'personages' =>$personages
        ]);
    }
}
