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

        session()->forget('villain');
        session()->forget('heros');

        $personages = Personage::all()->where('hero','=',true);
        $ever = Personage::all();
        $weapons = Weapons::all();

        return view('game.index',[
            'personages' =>$personages,
            'ever' =>$ever,
            'weapons' =>$weapons
        ]);
    }//index

    public function new()
    {
        return redirect()->route('game.index');
    }//new

    public function backoff()
    {
        return view('game.result',[
            'danger' => true,
            'result' =>"VERGONHA!
            Fugiram como covardes, envergonharam o reino de Gondor e condenaram a Terra Media a escuridão!
            Voltem e lutem pela Terra Media e por HONRA!"
        ]);
    }//backoff

    public function battle()
    {
        $cont_heros = 0;
        $cont_villains = 0;
        $frodo_rings = false;

        foreach (session('heros') as $heros){
            $cont_heros += (int)$heros['force'];
            $cont_heros += (int)$heros['dexterity'];
            $cont_heros += (int)$heros['magic'];
            if($heros['name'] == "Frodo" && $heros['weapons']->name == "Um Anel"){
                $frodo_rings = true;
            }
            if($this->checkLimitation($heros['weapons']->limitation,
                (int)$heros['force'],
                (int)$heros['dexterity'],
                (int)$heros['magic'],
                $heros['name']
            )) {
                $cont_heros += (int)rand($heros['weapons']->force_min, $heros['weapons']->force_max);
                $cont_heros += (int)rand($heros['weapons']->dexterity_min, $heros['weapons']->dexterity_max);
                $cont_heros += (int)rand($heros['weapons']->magic_min, $heros['weapons']->magic_max);
            }
        }

        foreach (session('villain') as $villains){
            if(!$frodo_rings && $villains['name'] == "Olho De Sauron") {
                continue;
            }
            $cont_villains += (int)$villains['force'];
            $cont_villains += (int)$villains['dexterity'];
            $cont_villains += (int)$villains['magic'];
            if($this->checkLimitation($villains['weapons']->limitation,
                (int)$villains['force'],
                (int)$villains['dexterity'],
                (int)$villains['magic'],
                $villains['name']
            )){
                $cont_villains += (int) rand($villains['weapons']->force_min, $villains['weapons']->force_max);
                $cont_villains += (int) rand($villains['weapons']->dexterity_min, $villains['weapons']->dexterity_max);
                $cont_villains += (int) rand($villains['weapons']->magic_min, $villains['weapons']->magic_max);
            }
        }

        $visual = false;
        $msg = "";
        if($cont_villains < $cont_heros){
            $visual = true;
            $msg = "VITORIA! A sociedade do Anel mostra sua força e derrota as forças inimigas!";
        }else{
            $visual = false;
            $msg = "DERROTA! A sociedade do Anel foi destruida como insetos!";
        }
        //dd(session('villain'), session('heros'),$cont_heros, $cont_villains);
        return view('game.result',[
            'visual' => $visual,
            'result' =>$msg
        ]);
    }//battle

    private function checkLimitation($limitaion, $force, $dexterity, $magic, $name)
    {
        if($limitaion == "Força >= 2" && $force >= 2){
            return true;
        }elseif($limitaion == "Força >= 5" && $force >= 5){
            return true;
        }elseif($limitaion == "Destreza >= 5" && $dexterity >= 5){
            return true;
        }elseif($limitaion == "Destreza >= 4" && $dexterity >= 4){
            return true;
        }elseif($limitaion == "Destreza >= 7" && $dexterity >= 7){
            return true;
        }elseif($limitaion == "Força >= 8" && $force >= 8){
            return true;
        }elseif($limitaion == "Magia >= 10" && $magic >= 10){
            return true;
        }elseif($limitaion == "Somente o Frodo" && $name == "Frodo"){
            return true;
        }elseif($limitaion == "Somente o Aragorn" && $name == "Aragorn"){
            return true;
        }
        return false;
    }//checkLimitation

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
                unset($aux[4]);
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
