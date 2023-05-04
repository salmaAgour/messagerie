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
    
      $msgRecu = MsgMod::findOrFail($id);           
      // $res = $request->all();        
      $msgRecu->update(['estRecu'=>true ,'dateRecu'=> $request->input('date')]);                        

      return redirect(url('/employee/dashboard'));
  }
  public function search(Request $request)
  {
    $NumEnv = $request->input('NumEnv');
    // $NomEtab= $request->input('NomEtab');
    $messages = DB::table('msg_mods')->where('NumEnv', $NumEnv)
                                    // ->where('NomEtab',$NomEtab)
    ->get();

    return view('employee.searchE', ['messages' => $messages]);
  }
}