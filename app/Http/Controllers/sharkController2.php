<?php

namespace App\Http\Controllers;
use App\Http\Requests\sharksrequest;
use Illuminate\Http\Request;
use App\Models\shark;


class sharkController2 extends Controller
{
    function list(){
        // return  shark::orderby('created_at', 'desc')->paginate(2);
        return  shark::paginate(5);
               }

function add(sharksrequest $request)
    {
        $shark = new shark;
        $shark->name = $request->name;
        $shark->email = $request->email;
        $shark->shark_level = $request->shark_level;
        $shark = $shark->save();
        // $shark = shark::create($request->all());
        If($shark){
            return  shark::orderby('created_at', 'desc')->paginate(5);;
                    }
                    else {
                            return ["Data"=>"Data has not been saved"];
                            }

            }
function update(sharksrequest $request)
    {
        $shark = shark::find($request->id);
        $shark->name = $request->name;
        $shark->email = $request->email;
        $shark->shark_level = $request->shark_level;
        $shark = $shark->save();
        // $shark = shark::create($request->all());
        If($shark){
            return  shark::orderby('created_at', 'desc')->paginate(5);;
                    }
                    else {
                            return ["Data"=>"Data has not been saved"];
                            }

            }
}
