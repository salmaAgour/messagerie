<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MsgMod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mPDF;
use MpdfException;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index()
  {
    $messages = DB::table('msg_mods')->where('auteur','=',auth()->user()->id)->paginate(10);
    return view('admin.home', ['messages' => $messages]);
  }

  public function create()
  {
    $services = DB::table('service_models')->get();
    return view('admin.create', ['services' => $services]);
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->only(['Lib_Doc', 'Pages', 'Copies', 'Lib_Serv']);
    $rows = [];

    $num = auth()->user()->message_count;
    $num++;
    User::where('id','=',auth()->user()->id)->update(['message_count' => $num]);

    foreach ($data['Lib_Doc'] as $index => $name) {
      $rows[] = [
        'Lib_Doc' => $data['Lib_Doc'][$index],
        'Pages' => $data['Pages'][$index],
        'Copies' => $data['Copies'][$index],
        'Lib_Serv' => $data['Lib_Serv'][$index],
        'NomEtab' => auth()->user()->name,
        'auteur'=>auth()->user()->id,
        'dateEnv' => now()->toDateTimeString(),
        'NumEnv' => $num,
      ];
    }

    DB::table('msg_mods')->insert($rows);
    $messages = DB::table('msg_mods')->get();
    return redirect()->to('/admin/dashboard')->with(['messages' => $messages]);
  }


  /**
   * Display the specified resource.
   */
  public function show(int $id)
  {
    $ms = MsgMod::findOrfail($id);
    return view('show', ['item' => $ms]);
  }

  public function search(Request $request)
  {
    $NumEnv = $request->input('NumEnv');
    $messages = DB::table('msg_mods')->where('NumEnv', $NumEnv)->get();

    return view('admin.searchRes', ['messages' => $messages]);
  }
  

}
