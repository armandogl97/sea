<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Network;
use App\User;
use Illuminate\Support\Facades\Storage;
use DB;
use Hash;
use Validator;
use Auth;
use Schema;
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
        $projects = Project::where('user_id',auth()->id())->get();
        return view('home')->with(compact('projects')); //LISTADO DE PROYECTOS
    }

    public function create()
    {
        return view('create'); //FORMULARIO DE CREAR PROYECTO
    }

    public function store(Request $request)
    {
         //Registrar proyecto en base de datos
        $project = new Project();
        $project->user_id = auth()->id();
        $project->name_problem = $request->input('name_problem');
        $project->desc_problem = $request->input('desc_problem');
        $project->save(); //insert

        return redirect('/home');

    }

    public function edit($project_id)
    {
        $project = Project::find($project_id);
        return view('eview')->with(compact('project')); //FORMULARIO DE ver/modificar
    }

    public function update(Request $request, $project_id)
    {
         //Registrar proyecto en base de datos
        $project = Project::find($project_id);
        $project->user_id = auth()->id();
        $project->name_problem = $request->input('name_problem');
        $project->desc_problem = $request->input('desc_problem');
        $project->save(); //update

        return redirect('/'.$project_id.'/characteristic');

    }

    public function destroy($project_id)
    {


        $networks = Network::where('project_id',$project_id)->get();
        foreach ($networks as $network) {
            Storage::delete('uploads/'.$network->ruta);
            $network->delete();
        }
        $project = Project::find($project_id);
        $project->delete(); //delete

        //Buscamos el reporte del proyecto
        $rpt = DB::table('report')->where('project_id',$project_id)->get();

        if(count($rpt)) {

          //Eliminamos la tabla de resultados
          Schema::dropIfExists($rpt[0]->tabla);

          DB::table("report")->where('project_id',$project_id)->delete();
          DB::table("report_totales")->where('report_id',$rpt[0]->id)->delete();
          DB::table("grupos")->where('rpt',$rpt[0]->id)->delete();

        }

        return back();

    }

    public function password(){
      $user = User::find(auth()->id());
      return view('account')->with(compact('user'));
    }

    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('/user')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('/user')->with('status', 'Contraseña cambiado con éxito');
            }
            else
            {
                return redirect('/user')->with('message', 'Credenciales incorrectas');
            }
        }
    }


    
}