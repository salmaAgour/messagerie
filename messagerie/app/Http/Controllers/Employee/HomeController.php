<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\MsgMod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $messages = DB::table('msg_mods')->orderBy('id', 'desc')->paginate(10);
    return view('employee.home', ['messages' => $messages]);
  }

  public function update(Request $request, string $id)
  {
    $msgRecu = MsgMod::findOrFail($id);
    // $res = $request->all();        
    $msgRecu->update(['estRecu' => true, 'dateRecu' => $request->input('date')]);

    return redirect(url('/employee/dashboard'));
  }

  public function search(Request $request)
  {
    $NumEnv = $request->input('NumEnv');
    $NomEtab = $request->input('NomEtab');

    if (!empty($NumEnv) && !empty($NomEtab)) {
      $messages = DB::table('msg_mods')->where([['NumEnv', $NumEnv], ['NomEtab', $NomEtab]])->get();
    } elseif (!empty($NumEnv)) {
      $messages = DB::table('msg_mods')->where('NumEnv', $NumEnv)->get();
    } elseif (!empty($NomEtab)) {
      $messages = DB::table('msg_mods')->where('NomEtab', $NomEtab)->get();
    }

    return view('employee.searchE', ['messages' => $messages]);
  }

  public function nonRecu()
  {
    $messages = DB::table('msg_mods')->where('estRecu','=',false)->paginate(10);
    return view('employee.nonRecu', ['messages' => $messages]);
  }

  public function recu()
  {
    $messages = DB::table('msg_mods')->where('estRecu','=',true)->paginate(10);
    return view('employee.recu', ['messages' => $messages]);
  }
}
