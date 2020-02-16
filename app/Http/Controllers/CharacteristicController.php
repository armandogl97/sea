<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Characteristic;
use App\Project;

class CharacteristicController extends Controller
{
    public function index($project_id)
    {
        $titulo = Project::find($project_id);      
        $characteristics = Characteristic::where('project_id',$project_id)->get();
        return view('characteristic')->with(compact('characteristics'))->with(compact('project_id'))->with(compact('titulo')); //LISTADO DE PROYECTOS
    }

    public function store(Request $request,$project_id)
    {
         //Registrar characeristic en base de datos
        $characeristic = new Characteristic();
        $characeristic->project_id = $project_id;
        $characeristic->name_c = strtoupper($request->input('name_c'));
        $characeristic->save(); //insert

        return back();

    }

    public function destroy($project_id, $characteristic_id)
    {
        $characteristic = Characteristic::find($characteristic_id);
        $characteristic->delete(); //delete

        return back();

    }
}
