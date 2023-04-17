<?php

namespace App\Http\Controllers;

use App\Models\MsgMod;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $msg=MsgMod::all();
        return view('index' , ['i'=> $msg]);
    }
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $msg=new MsgMod();
        $msg->Lib_Doc=$request->input('Lib_Doc');
        $msg->Pages=$request->input('Pages');
        $msg->Copies=$request->input('Copies');
        $msg->save();
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ms=MsgMod::findOrfail($id);
        return view ('show' , ['item'=>$ms]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return('hi from edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return('hi from update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return('hi from destroy');
    }

}
