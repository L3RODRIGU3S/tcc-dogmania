<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animais;
use Illuminate\Support\Facades\URL;
use PDF;

class AnimaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busca = request('busca');

        if($busca) {

            $animais = Animais::where('registro', 'like', '%'.$busca.'%')->orWhere('email', 'like', '%'.$busca.'%')->paginate(10);

        } else {
            $animais = Animais::orderBy('id', 'desc')->paginate(10);
        } 

        return view('animais.index', compact('animais', 'busca'));
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
    public function store(Request $request)
    {
        $animal = new Animais;

        $animal->nome = $request->nome;
        $animal->email = $request->email;
        $animal->registro = date("dmYhis");

        $url = URL::to('/');

        /** Titrar comentario para colocar em producao
        \QrCode::size(300)
            ->format('png')
            ->generate("$url/list/$animal->registro", public_path("qrcodes/$animal->registro.png"));
        */

        $animal->save();
        return redirect('exames')->with('success', 'Animal Cadastrado Com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animais = Animais::findOrFail($id);

        return view('animais.edit', compact('animais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$data = $request->all();
        //Animais::findOrFail($request->id)->update($data);
        Animais::findOrFail($id)->update($request->all());
        
        return redirect('exames')->with('success', 'Animal Editado Com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Animais::findOrFail($id)->delete();

        return redirect('exames')->with('success', 'Animal Excluido Com Sucesso!');
    }

    public function impressao($number){
       
        $data = [
            'foo' => $number,
          ];
          $pdf = PDF::LoadView('pdf.document', $data, [],[
            'title' => 'Impressão de canhoto do PET',
            'format' => 'A7',
            'margin_left' => 1,
            'default_font_size' => '10',
            'margin_top' => 5,
          ]);
          return $pdf->stream('document.pdf');
    }
}
