<?php

namespace App\Http\Controllers;

use App\Deputado;
use Illuminate\Http\Request;

class DeputadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $json = file_get_contents('http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json');
        $obj = json_decode($json);
        $deputados = $obj->list;
        
        Deputado::truncate();
        foreach($deputados as $deputado){
            Deputado::create([
                'id' => $deputado->id,
                'nome' => $deputado->nome,
                'partido' => $deputado->partido,
                'tagLocalizacao' => $deputado->tagLocalizacao,
                ]);
                
        }
        return redirect()->action('DeputadoController@show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deputado  $deputado
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $deputados = Deputado::all();

        return view('deputados.show', compact('deputados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deputado  $deputado
     * @return \Illuminate\Http\Response
     */
    public function edit(Deputado $deputado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deputado  $deputado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deputado $deputado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deputado  $deputado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deputado $deputado)
    {
        //
    }
}
