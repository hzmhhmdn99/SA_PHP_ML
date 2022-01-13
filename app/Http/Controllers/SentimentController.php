<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MonkeyLearn\Client;

require_once('../vendor/autoload.php');
require_once('../config.php');

class SentimentController extends Controller
{
    //
    public function create()
    {
        //
        return view('sentiment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $req = $request->input('review');
        echo "Text: ".$req;
        echo "<br>";
        echo "<br>";
        
        $ml = new Client(MONKEYLEARN);
        $data = [" $req "];
        $model_id = '<YOUR MODEL ID>';
        $res = $ml->classifiers->classify($model_id, $data);
        
        //$json = json_decode()
        //var_dump($res->result);

        //$response = json_decode($res);

        $json_en = json_encode($res->result)."\n";

        /*

        echo $json_en;
        
        echo "<br>";
        echo "<br>";
        */
        

        $json_de = json_decode($json_en, true);

        //var_dump ($json_de);     

        echo "<br>";
        echo "<br>";

        echo "Sentiment: ".$json_de[0]['classifications'][0]['tag_name'];
        echo "<br>";
        echo "Confidence: ".$json_de[0]['classifications'][0]['confidence'];
        

        //return $json_de[0]['classifications'][0]['tag_name'];
        //return $json_de[0]['classifications'][0]['confidence'];

                  
    }


}
