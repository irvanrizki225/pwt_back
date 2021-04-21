<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $items = products::orderBy('id','DESC')->take(5)->get();
        return view('pages.Dashboard')->with([
            'items'=>$items
        ]);
    }
}
