<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function currencyFunc()
    {
        $date = '20'.date('y-m-d');
        //echo $date;
        $xmlString = file_get_contents('https://haldus.eestipank.ee/et/export/currency_rates?imported='.$date.'&type=xml');
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

        //print_r($phpArray);

        $phpArray2 = $phpArray['Cube']['Cube']['Cube'];
        $phpArray3 = array_column($phpArray2, '@attributes');
        //echo '<pre>'; print_r($phpArray3);

        //$phpArray4=$phpArray2[0]['@attributes'];

        //echo '<pre>'; print_r($phpArray4);

        

        return view('welcome', compact('phpArray3'));
    }
}
