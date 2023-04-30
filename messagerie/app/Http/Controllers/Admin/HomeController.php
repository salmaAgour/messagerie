<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MsgMod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    return view('admin.home');
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
        $msg->Lib_Serv=$request->input('Lib_Serv');
        $msg->NomEtab=auth()->user()->name;
        $msg->dateEnv=now()->toDateTimeString();
        $msg->NumEnv=123;
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

    public function search(Request $request)
    {
        

        $NumEnv = $request->input('NumEnv');
        
        $item = DB::table('msg_mods')->where('NumEnv', $NumEnv)
        
            ->get();

        return view('searchRes', ['i' => $item]);
    }

}