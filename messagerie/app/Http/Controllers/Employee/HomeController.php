<?php
namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Models\MsgMod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
    $messages = DB::table('msg_mods')->paginate(10);
    return view('employee.home', ['messages' => $messages]);
  }
  public function update(Request $request, string $id){
    {
      $etudiant = MsgMod::findOrFail($id);           
      $res = $request->all();        
      $etudiant->update(['estRecu'=>true]);                        

      return redirect(url('/etudiants'))->with('ajour', 'Etudiant bien ete bien mis à jour');
  }
  }
}