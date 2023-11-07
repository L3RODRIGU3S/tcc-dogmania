<?php

namespace App\Http\Controllers;

use App\Models\Exames;
use App\Models\Animais;
use Illuminate\Http\Request;

class ExamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$exames = Exames::where('animais_id', $id)->paginate(10);

        //return view('anexos.index', compact('exames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exames  $exames
     * @return \Illuminate\Http\Response
     */
    public function show(Exames $exames)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exames  $exames
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$animais = Animais::orderBy('id', 'desc')->paginate(10);
        $exames = Exames::where('animais_id', $id)->paginate(10);
        $animal_id = $id;

        return view('anexos.index', compact('exames', 'animal_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exames  $exames
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exames  $exames
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exames::findOrFail($id)->delete();

        return redirect('exames')->with('success', 'Exame Excluido Com Sucesso!');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function joinAnexo(Request $request, $id)
    {
        $animal_id = $id;
        $exame = new Exames;

        if ($request->hasFile('pdfexame')) {
            $pdf = $request->file('pdfexame');
            $nome = date("dmYhis");
            $nomearquivo = $nome . ".".$pdf->getClientOriginalExtension();
            $request->file('pdfexame')->move(public_path('./pdf/exames/'),$nomearquivo);

            $exame->url = $nome;
            $exame->animais_id = $animal_id;
            $exame->save();
            return redirect('exames')->with('success', 'Exame Anexado Com Sucesso!');
            
            //$request->file('pdfexame')->move(app_path('../../public_html/exames.hospitalamigofiel.com.br/pdf/exames/'),$nomearquivo);
        }else{
            dd("Não deu certo");
        }
    }
}
