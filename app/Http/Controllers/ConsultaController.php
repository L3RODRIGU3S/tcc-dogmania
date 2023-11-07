<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animais;
use App\Models\Exames;

class ConsultaController extends Controller
{
    
    public function index_anexo(){

        return view('consulta.consulta');

    }
    
    public function lista_anexo(Request $request){
                
        $busca = request('buscaexame');

            if($busca) {

                $animal_id = Animais::where('registro', $busca)->first(['id']);
                $animal_id = intval($animal_id->id);

                $exames = Exames::where('animais_id', $animal_id)->paginate(10);
                
                } else {
                    //$animais = Animais::orderBy('id', 'desc')->paginate(10);
                } 
        
        return view('consulta.lista', compact('exames', 'busca'));
    }

    public function list($id){
        $animal = Animais::where('registro', $id)->first(['id']);
        $animal = intval($animal->id);
        $exames = Exames::where('animais_id', $animal)->paginate(10);
        
        return view('consulta.lista', compact('exames'));
    }
}
