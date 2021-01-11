<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

use Illuminate\Support\Str;
use App\Models\Tirage;

class TirageController extends Controller{
    public function index(Request $r){
        $my_numbers = explode('-', Tirage::find(1)->toArray()["tirage"]);
        if($r->has('number')){
            return view('tirage')->with(['my_numbers'=>$my_numbers,'number'=> $r->input('number'), 'year'=> $r->input('year'),'tirage'=>$this->tirage($r->input('year'), $r->input('number'))]);
        }else{
            return view('tirage')->with(['my_numbers'=>$my_numbers, 'number'=> 1, 'year'=> date('Y'),'tirage'=>$this->tirage(date('Y'), 1)]);
        }
        
    }

    public function save(){
        Tirage::truncate();
        $tirage = Tirage::create([
            'tirage'    =>  "1-2-3-7-8-9-1-4-8-9-11-15-2-9-12-14-20-29-1-2-16-20-22-26"
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

        $gain = $crawler->filter('table tr td')->each(
            function ($node) {
                return  $node->text();
            }
        );

        if(!empty($gain)){
            $gains = [
                6       =>  $gain[2],
                'C'     =>  $gain[5],
                5       =>  $gain[8],
                4       =>  $gain[11],
                3       =>  $gain[14]
            ];            
        }else{
            $gains = [];
        }

        if(!empty($tirage)){
            return  [
                1       =>  $tirage[0],
                2       =>  $tirage[1],
                3       =>  $tirage[2],
                4       =>  $tirage[3],
                5       =>  $tirage[4],
                6       =>  $tirage[5],
                'C'     =>  $tirage[6],
                'gains' =>  $gains
            ];            
        }else{
            return [];
        }

    }

    public function gains($year=2021, $number=1){
        
        $URL = Str::replaceArray('?', [$year, $number], env('TIRAGE_URL'));
        $client = new Client(HttpClient::create(['timeout' => 60,'verify_peer' => false]));
        $crawler = $client->request('GET', $URL);

        $tirage = $crawler->filter('table tr td')->each(
            function ($node) {
                return  $node->text();
            }
        );

        if(!empty($tirage)){
            return  [
                6       =>  $tirage[2],
                'C'       =>  $tirage[5],
                5       =>  $tirage[8],
                4       =>  $tirage[11],
                3       =>  $tirage[14]
            ];            
        }else{
            return [];
        }

    }
}
