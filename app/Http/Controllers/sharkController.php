<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shark;


class sharkController extends Controller
{
    function list(){
        return  shark::all();
               }

function add(Request $req)
    {
        // return ["Data"=>"Data has been saved"];
        $shark = new shark;
        $shark->name = $req->name;
        $shark->email = $req->email;
        $shark->shark_level = $req->shark_level;
        $result = $shark->save();
        If($result){
            return ["Data"=>"Data has been saved"];
                    }
                    else {
                            return ["Data"=>"Data has not been saved"];
                            }

            }
}
