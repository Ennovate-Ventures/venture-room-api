<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Startup,
    User
};
use Illuminate\Support\Facades\Validator;

class StartupController extends Controller
{
    public function information(Request $request){
        $user = User::where('id', $request->user()->id)->withCount('startups')->first();
        return response()->json([
            'startup_count' => $user->startups_count
        ], 200);
    }
    
    public function index()
    {
        return Startup::withCount(['investors'])->with([
            'goals'
        ])->get();
    }

    public function getFounderStartups(Request $request)
    {
        $user = User::where('id', $request->user()->id)->with('startups')->first();
        return $user->startups;
    }

    public function getStartup($id)
    {
        return Startup::where('id', $id)->withCount(['investors'])
            ->with([
                'goals'
            ])->first();
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_name' => 'required', 
            'employee_count' => 'required',
            'revenue' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json('upload all data', 400);
        }

        // Create a new Startup model instance
        $startup = new Startup([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image_name'),
            'employee_count' => $request->input('employee_count'),
            'revenue' => $request->input('revenue'),
            'user_id' => $request->user()->id
        ]);

        $startup->save();

        return response()->json('Startup created successfully', 201);

        return response()->json('Image upload failed', 500);
    }

    public function update(Request $request)
    {

        $s = Startup::where('id', $request->id)->first();

        $s->update([
            'name' => $request->name,
            'description' => $request->description,
            'employee_count' => $request->employee_count,
            'revenue' => $request->revenue,
        ]);

        return response()->json('Starup updated', 200);
    }

    public function delete($id)
    {
        $s = Startup::find($id);
        $s->delete();
        return response()->json('Starup deleted', 200);
    }
}
