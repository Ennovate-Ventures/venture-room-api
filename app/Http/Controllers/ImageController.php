<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required', // Allowed image types and maximum size in kilobytes
        ]);

        if ($validator->fails()) {
            return response()->json('an error occured', 400);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/startups'), $imageName);

            return response()->json("/images/startups/" . $imageName, 201);
        }

        return response()->json('Image upload failed', 500);
    }
}
