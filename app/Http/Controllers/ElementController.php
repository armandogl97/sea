<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Characteristic;
use App\Element;

class ElementController extends Controller
{
    public function index($project_id,$characteristic_id)
    {   $characteristic = Characteristic::find($characteristic_id);

        $elements_social = Element::where('characteristic_id',$characteristic_id)
        			->Where('ambit','SOCIAL')->get();
        $elements_economico = Element::where('characteristic_id',$characteristic_id)
        			->Where('ambit','ECONOMICO')->get();
        $elements_cultural = Element::where('characteristic_id',$characteristic_id)
        			->Where('ambit','CULTURAL')->get();
        $elements_politico = Element::where('characteristic_id',$characteristic_id)
        			->Where('ambit','POLITICO')->get();
        $elements_leyes = Element::where('characteristic_id',$characteristic_id)
        			->Where('ambit','LEYES-INSTITUCIONAL')->get();
        $elements_salud = Element::where('characteristic_id',$characteristic_id)
        			->Where('ambit','SALUD')->get();
        $elements_biofisico = Element::where('characteristic_id',$characteristic_id)
        			->Where('ambit','BIOFISICO')->get();
        return view('element')
        ->with(compact('elements_social'))
        ->with(compact('elements_economico'))
        ->with(compact('elements_cultural'))
        ->with(compact('elements_politico'))
        ->with(compact('elements_leyes'))
        ->with(compact('elements_salud'))
        ->with(compact('elements_biofisico'))
        ->with(compact('characteristic_id'))->with(compact('characteristic'))->with(compact('project_id')); //vista de elementos
    }

    public function store(Request $request,$project_id,$characteristic_id)
    {
         //Registrar elemento en base de datos
        $element = new Element();
        $element->characteristic_id = $characteristic_id;
        $element->project_id = $project_id;
        $element->ambit = $request->input('ambit');
        $element->name_e = strtoupper($request->input('name_e'));
        $element->save(); //insert

        return redirect('/'.$project_id.'/characteristic/'.$characteristic_id.'/elements');

    }


    public function destroy($project_id,$characteristic_id,$element_id)
    {
        $element = Element::find($element_id);
        $element->delete(); //delete

        return back();
    }
}