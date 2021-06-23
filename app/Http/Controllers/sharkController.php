<?php

namespace App\Http\Controllers;
use App\Http\Requests\sharksrequest;
use Illuminate\Http\Request;
use App\Models\shark;

class sharkController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name = null)
    {
        // Get methos for showing ths lists
        // The index function is solely responsible for returning the student index view with every student record that exists in the database. Update the function to reflect the code below.
    // public function index()
    // {
    //     $students = Student::all();
    //     return view('students.index', compact('students','students'));
    // }
        if($name != null){
           return shark::where("name","like","%".$name."%")->get(); 
 
           // $shark['data'] shark::where("name","like","%".$name."%")->get(); 
           // return request()->json(200, $shark);
        }else{
          return  shark::orderby('id','desc')->paginate(5);  
        }
        
    }
    public function search($name){
        return shark::where("name","like","%".$name."%")->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // This function create laravel balde file as return for new addition of record
        // The create function, similar to the index, is responsible for returning the create view for the student data. Update the function as below
// public function create()
//     {
//         return view('students.create');
//     }

 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(sharksrequest $request)
    {
        // The function store is responsible for accepting a POST request, accepting data submitted from the Create view. The function will attempt to validate the data by making sure whatever is marked as required is present. The validator also validates specific fields to make sure they are numeric and are of an email address format too! After that, the function will add the record to the database. Update the function to reflect the snippet below
        // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'age' => 'required|numeric',
    //         'email' => 'required|email',
    //     ]);

    //     $input = $request->all();

    //     Student::create($input);

    //     return redirect()->route('students.index');
    // }


        $shark = new shark;
        $shark->name = $request->name;
        $shark->email = $request->email;
        $shark->shark_level = $request->shark_level;
        $shark->published = $request->published;
        $shark = $shark->save();
        // $shark = shark::create($request->all());
        If($shark){
            return  shark::orderby('created_at', 'desc')->paginate(5);;
                    }
                    else {
                            return ["Data"=>"Data has not been saved"];
                            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //This function is responsible for the ‘Read’ part of the CRUD. It accepts a single ID which is then used to attempt to find the record in the database that matches that ID. Then, if found, returns the record into the ‘Show’ view . Refactor the show function to reflect the snippet below .
    //     public function show($id)
    // {
    //     $student = Student::findOrFail($id);
    //     return view('students.show', compact('student','student'));
    // }

        $shark = shark::find($id);
        // If($shark){
        //     return  shark::orderby('created_at', 'desc')->paginate(5);;
        //             }
        //             else {
        //                     return ["Data"=>"Data has not been saved"];
        //                     }
        return response()->json($shark);
    }
    public function edit($id)
{
// Now , the edit function takes a parameter of the record ID we want to update. With that, it queries the database and grabs the record and passes it back into the edit view, which we can populate a form with the data ready for updating.
// public function edit($id)
//     {
//         $student = Student::find($id);
        
//         return view('students.edit', compact('student','student'));
//     }
    $shark = shark::find($id);
    return response()->json($shark);

}

public function update($id, Request $request)
    {
        $shark = shark::find($id);
        $shark = $shark->update($request->all());
If($shark){
            return  shark::orderby('created_at', 'desc')->paginate(5);;
                    }
                    else {
                            return ["Data"=>"Data has not been saved"];
                            }
        // return response()->json('shark updated!');
    }

    public function destroy($id)
    {
        // Lastly , our destroy function, which is another term for delete. The function accepts an ID as a parameter to find the record we want to delete and of course, deletes it. If the record cannot be found and therefore, fails, a 404 not found page will be returned to the user 

// public function destroy($id)
//     {
//         $student = Student::findOrFail($id);

//         $student->delete();
        
//         return redirect()->route('students.index');
//     }

        $shark = shark::find($id);
        $shark =$shark->delete();
        If($shark){
            return  shark::orderby('id', 'desc')->paginate(5);;
                    }
                    else {
                            return ["Data"=>"Data has not been saved"];
                            }

        // return response()->json('shark deleted!');
    }
}
