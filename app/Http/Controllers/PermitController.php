<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PermitRequest;

use App\Models\permits;
use App\Models\products;
use App\Models\User;
use App\Models\Signature;


class PermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = permits::with('User', 'products', 'Signature')->get();

        return view('pages.permit.index')->with([
            'items'=>$items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $products = products::all();
        $signature = signature::all();

        return view('pages.permit.create')->with([
            'user'=>$user,
            'producs'=>$products,
            'signature'=>$signature,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermitRequest $request)
    {
        $data = $request->all();

        permits::create($data);
        return redirect()->route('permit.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = permits::findOrfail($id);

        return view ('pages.permit.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermitRequest $request, $id)
    {
        $data = $request->all();

        $item = permits::findOrfail($id);
        $item->update();

        return redirect()->route('permit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
