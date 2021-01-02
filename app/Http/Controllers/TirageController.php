<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

use Illuminate\Support\Str;
use App\Models\Tirage;

class TirageController extends Controller{
    public function index(Request $r){
        $my_numbers = explode('-', Tirage::find(1)->tirage);
        if($r->has('number')){
            return view('tirage')->with(['my_numbers'=>$my_numbers,'number'=> $r->input('number'),'tirage'=>$this->tirage(2020, $r->input('number'))]);
        }else{
            return view('tirage')->with(['my_numbers'=>$my_numbers, 'number'=> 283,'tirage'=>$this->tirage(2020, 283)]);
        }
        
    }

    public function save(){
        Tirage::truncate();
        $tirage = Tirage::create([
            'tirage'    =>  "4-3-1-8-43-18-5-16-13-18-14-10-40-49-38-37-30-48"
        ]);
        dump($tirage);
    }

    public function tirage($year=2020, $number=0){
        $start_2020 = 169;
        
        $URL = Str::replaceArray('?', [$year, $number], env('TIRAGE_URL'));
        $client = new Client(HttpClient::create(['timeout' => 60,'verify_peer' => false]));
        $crawler = $client->request('GET', $URL);
        $tirage = $crawler->filter('.res-standard-oval-number')->each(
                        function ($node) {
                            return  $node->text();
                        }
                    );
        if(!empty($tirage)){
            return  [
                1       =>  $tirage[0],
                2       =>  $tirage[1],
                3       =>  $tirage[2],
                4       =>  $tirage[3],
                5       =>  $tirage[4],
                6       =>  $tirage[5],
                'C'     =>  $tirage[6],
            ];            
        }else{
            return [];
        }

    }
}
