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
    }//index

    public function backoff()
    {
        return view('game.result',[
            'result' =>"VERGONHA!
            Fugiram como covardes, envergonharam o reino de Gondor e condenaram a Terra Media a escuridão!
            Voltem e lutem pela Terra Media e por HONRA!"
        ]);
    }//backoff

    public function battle()
    {

        return view('game.result',[
            'result' =>"VERGONHA!
            Fugiram como covardes, envergonharam o reino de Gondor e condenaram a Terra Media a escuridão!
            Voltem e lutem pela Terra Media e por HONRA!"
        ]);
    }//backoff

    public function hero(Request $request)
    {

        $result = Array();
        foreach ($request->get('tropa') as $tropa){
            array_push($result,$tropa);
        }
        //Dados personagens escolhidos
        $personages = Personage::whereIn('id',$result)->get();
        $weapons = Weapons::all();
        //Pegar 5 armas aleatorias
        $rand = array_rand($weapons->toArray(),5);
        $res = Array();
       foreach ($rand as $r){
               array_push($res,$weapons[$r]);
        }

        return view('game.heros',[
            'personages' =>$personages,
            'weapons' =>$res
        ]);
    }//hero

    public function villains(Request $request)
    {
        $villains = Personage::where('hero','=',false)->get();
        $villain = $this->makeVillains($villains->toArray());

        $heros = $this->makeHeros($request);
        session()->put('villain', $villain);
        session()->put('heros', $heros);
//dd($villain);
        return view('game.battle',[
            'villain' => $villain
        ]);
    }//battle

    private function makeHeros($request)
    {
        $result = [];
        $count = 0;

        for ($x=1;$x<6;$x++){
            $result[$count] = Personage::where('id','=',$request->get("hero-".$x))->first();
            $result[$count]['weapons'] = $weapons = Weapons::where('id','=',$request->get("armas-".$x))->first();
            $count++;
        }
        return $result;
    }//makeHeros

    private function makeVillains(array $villains)
    {
        $aux = [];
        for ($x=0;$x<5;$x++){
            $rand = array_rand($villains,1);
            //GARANTINDO QUE SÓ HAVERÁ UM SAURUM.
            if(0 == $rand && in_array($rand, $aux)){
                $x--;
            }else{
                array_push($aux,$rand);
            }

            //GARANTINDO QUE SEMPRE TERÁ UM Uruk-Hai
            if(count($aux) == 4 && !in_array(1, $aux)){
                $x--;
            }

        }
        $weapons = Weapons::whereNotIn('id', [10,11])->get();
        $result = [];
        $count = 0;
        foreach ($aux as $r){
            $result[$count] = $villains[$r];
            $result[$count]['weapons'] = $weapons[array_rand($weapons->toArray(),1)];
            $count++;
        }
        return $result;
    }//makeVillains
}
