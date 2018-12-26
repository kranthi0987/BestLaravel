<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Http\Controllers;

use App\Models\ImageProjectModel;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ImageView');
    }


    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serverurl = "http://localhost:8000";
//        $imageName = request()->file->getClientOriginalName();
//        request()->file->move(public_path('upload'), $imageName);
        $image = new ImageProjectModel();
        $imageName = request()->file->getClientOriginalName();
        $fileName = pathinfo($imageName, PATHINFO_FILENAME);
        $fileExt = request()->file->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        $pathToStore = request()->file->storeAs('data/images', $fileNameToStore);

//        $imageName = request()->file->getClientOriginalName();
        request()->file->move(public_path('data/images'), $fileNameToStore);
        $image->name = $fileNameToStore;
        $image->imageurl = $serverurl . '/' . $pathToStore;
        $image->save();
        return response()->json(['uploaded' => '/upload/' . $imageName]);
    }

}
