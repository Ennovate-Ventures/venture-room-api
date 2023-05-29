<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Founder;

class FounderController extends Controller
{
    public function index(){
        return Founder::get();
    }

    public function store(Request $request){

        Founder::create([
            'startup_id' => $request->startup_id, 
            'user_id' => $request->user_id, 
            'name' => $request->name,
            'date_of_birth' => $request->dob, 
            'description' => $request->description,
            'link' => $request->link
        ]);

        return response()->json('Founder created', 200);
    }

    public function update(Request $request, $id){

        $f = Founder::find($id);

        $f->update([
            'user_id' => $request->user_id, 
            'name' => $request->name,
            'date_of_birth' => $request->dob, 
            'description' => $request->description,
            'link' => $request->link
        ]);

        return response()->json('Founder updated', 200);
    }

    public function delete($id){
        $f = Founder::find($id);
        $f->delete();
        
        return response()->json('Founder deleted', 200);
    }

}
