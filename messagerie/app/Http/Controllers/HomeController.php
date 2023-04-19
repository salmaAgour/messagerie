<?php

namespace App\Http\Controllers;

use App\Models\MsgMod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $msg=MsgMod::all();
        // $msgsUnique = $msg->unique('NumEnv');
        // $msgDuplicates = $msg->diff($msgsUnique);
        $msg=DB::table('msg_mods')->select('NumEnv' , DB::raw('count(id) as count'))
                        ->groupBy('NumEnv')
                        ->having('count','>=' , 1)
                        ->get();
                    dd($msg);
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
    public function show(int $id)
    {
        $ms=MsgMod::findOrfail($id);
        return view ('show' , ['item'=>$ms]);
    }

    
}
