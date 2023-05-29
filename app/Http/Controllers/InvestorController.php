<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investor;

class InvestorController extends Controller
{
    public function index(){
        return Investor::get();
    }

    public function store(Request $request){
        Investor::create([
            'user_id' => $request->user_id, 
            'income_source' => $request->income, 
            'name' => $request->name,
        ]);

        return response()->json('Investor created', 200);
    }

    public function update(Request $request, $id){
        $i = Investor::find($id);

        $i->update([
            'user_id' => $request->user_id, 
            'income_source' => $request->income, 
            'name' => $request->name,
        ]);

        return response()->json('Investor updated', 200);
    }

    public function delete($id){
        $i = Investor::find($id);

        $i->delete();

        return response()->json('Investor deleted', 200);
    }
}
