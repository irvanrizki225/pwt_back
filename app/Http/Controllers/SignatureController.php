<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Signature;
use App\Models\products;
use App\Models\User;

class SignatureController extends Controller
{
    public function index()
    {
        $items = Signature::with('User')->get();

        return view('pages.signature.index')->with([
            'items' => $items
        ]);
    }

    public function create()
    {
        $user = User::all();
        return view('pages.signature.create')->with([
            'user' =>$user
        ]);
    }

    public function store(Request $request)
    {
        $folderPath = public_path('signature/');
       
        $image_parts = explode(";base64,", $request->signed);
             
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
 
        $signature = uniqid() . '.'.$image_type;
           
        $file = $folderPath . $signature;
 
        file_put_contents($file, $image_base64);
 
        $save = new Signature;
        $save->user_id = $request->user_id;
        $save->name = $request->name;
        $save->signature = $signature;
        $save->save();

        return redirect()->route('signature.index');
    }

}
