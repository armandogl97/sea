<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Law;

class PppController extends Controller
{
    public function index()
    {
    	$inem='nothing';
    	return view('ppp')->with(compact('inem'));
    }

    public function inem($inem)
    {
    	if ($inem=='internacional') {
            $politicas_internacionales = Law::where('user_id',auth()->id())->where('group','politica internacional')->get();
            $planes_internacionales = Law::where('user_id',auth()->id())->where('group','plan internacional')->get();
            $programas_internacionales = Law::where('user_id',auth()->id())->where('group','programa internacional')->get();

    		return view('ppp')->with(compact('inem'))
            ->with(compact('politicas_internacionales'))
            ->with(compact('planes_internacionales'))
            ->with(compact('programas_internacionales'));
    	}

    	if ($inem=='nacional') {
    		$politicas_nacionales = Law::where('user_id',auth()->id())->where('group','politica nacional')->get();
            $planes_nacionales = Law::where('user_id',auth()->id())->where('group','plan nacional')->get();
            $programas_nacionales = Law::where('user_id',auth()->id())->where('group','programa nacional')->get();

            return view('ppp')->with(compact('inem'))
            ->with(compact('politicas_nacionales'))
            ->with(compact('planes_nacionales'))
            ->with(compact('programas_nacionales'));
    	}

    	if ($inem=='estatal') {
    		$politicas_estatales = Law::where('user_id',auth()->id())->where('group','politica estatal')->get();
            $planes_estatales = Law::where('user_id',auth()->id())->where('group','plan estatal')->get();
            $programas_estatales = Law::where('user_id',auth()->id())->where('group','programa estatal')->get();

            return view('ppp')->with(compact('inem'))
            ->with(compact('politicas_estatales'))
            ->with(compact('planes_estatales'))
            ->with(compact('programas_estatales'));
    	}

    	if ($inem=='municipal') {
    		$politicas_municipales = Law::where('user_id',auth()->id())->where('group','politica municipal')->get();
            $planes_municipales = Law::where('user_id',auth()->id())->where('group','plan municipal')->get();
            $programas_municipales = Law::where('user_id',auth()->id())->where('group','programa municipal')->get();

            return view('ppp')->with(compact('inem'))
            ->with(compact('politicas_municipales'))
            ->with(compact('planes_municipales'))
            ->with(compact('programas_municipales'));
    	}
    }

    public function store(Request $request, $inem)
    {
    	 //Registrar elemento en base de datos
        $law = new Law();
        $law->user_id = auth()->id();
        $law->name_law = $request->input('name');
        $law->group = $request->input('group');
        $law->save(); //insert
        return back();
    }

    public function destroy($id)
    {
        $law = Law::find($id);
        $law->delete(); //delete
        return back();
    }
}
