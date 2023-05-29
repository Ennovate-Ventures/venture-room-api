<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;

class StartupController extends Controller
{
    public function index(){
        return Startup::get();
    }

    public function store(Request $request){

            Startup::create([
                'name' => $request->name, 
                'description' => $request->description, 
                'employee_count' => $request->employee_count,
                'revenue' => $request->revenue, 
            ]);

            return response()->json('Starup created', 200);
    }

    public function update(Request $request, $id){

        $s = Startup::find($id);

        $s->update([
            'name' => $request->name, 
            'description' => $request->description, 
            'employee_count' => $request->employee_count,
            'revenue' => $request->revenue, 
        ]);

        return response()->json('Starup updated', 200);

    }

    public function delete($id){
        $s = Startup::find($id);
        $s->delete();
        return response()->json('Starup deleted', 200);
    }

}
