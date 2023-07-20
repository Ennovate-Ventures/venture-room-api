<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Startup, User
};

class StartupController extends Controller
{
    public function index(){
        return Startup::withCount(['investors'])->with([
            'goals'
        ])->get();
    }

    public function getFounderStartups(Request $request){
        $user = User::where('id', $request->user()->id)->with('startups')->first();
        return $user->startups;
    }

    public function getStartup($id){
        return Startup::where('id', $id)->withCount(['investors'])
                        ->with([
                            'goals'
                        ])->first();
    }

    public function store(Request $request){

        dd($request->user());

        return

            Startup::create([
                'name' => $request->name, 
                'description' => $request->description, 
                'employee_count' => $request->employee_count,
                'revenue' => $request->revenue, 
                'user_id' => 5
            ]);

            return response()->json('Starup created', 200);
    }

    public function update(Request $request){

        $s = Startup::where('id',$request->id)->first();

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
