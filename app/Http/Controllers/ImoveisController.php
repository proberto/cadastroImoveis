<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImoveisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imoveis = Imoveis::all();
        return view('imoveis.imoveis', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imovel = new Imoveis();
        return view('imoveis.create', compact('imovel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto_capa' => 'required|max:5120|mimes:jpg',
            'codigo' => 'required|unique:imoveis|max:10',
            'titulo' => 'required|max:40',
            'categoria' => 'required',
        ]);

        $imageDB = 0;
        if($request->hasFile('foto_capa')) {
            $image = $request->file('foto_capa');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image2 = $destinationPath . "/" . $name;
            $imageDB = Str::after($image2, 'public');
            $image->move($destinationPath, $name);
        }
        $valor = str_replace(".","",$request['valor']);
        $valor_1 = str_replace(",",".",$valor);
        Imoveis::Create([
            'foto_capa' => $imageDB,
            'codigo' => $request['codigo'],
            'titulo' => $request['titulo'],
            'categoria' => $request['categoria'],
            'valor'=> $valor_1,
            'observacao' => $request['observacao'],
        ]);

        $imoveis = Imoveis::all();
        return view('imoveis.imoveis', compact('imoveis'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imovel = Imoveis::findorfail($id);
        return view('imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imovel = Imoveis::findorfail($id);
        return view('imoveis.edit', compact('imovel'));
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
        $request->validate([
            'foto_capa' => 'required|max:5120|mimes:jpg',
            'codigo' => 'required|max:10',
            'titulo' => 'required|max:40',
            'categoria' => 'required',
        ]);

        $imageDB = 0;
        if($request->hasFile('foto_capa')) {
            $image = $request->file('foto_capa');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image2 = $destinationPath . "/" . $name;
            $imageDB = Str::after($image2, 'public');
            $image->move($destinationPath, $name);
        }
        $valor = str_replace(".","",$request['valor']);
        $valor_1 = str_replace(",",".",$valor);
        $imovel = Imoveis::findorfail($id);
        $imovel->fill([
            'foto_capa' => $imageDB,
            'codigo' => $request['codigo'],
            'titulo' => $request['titulo'],
            'categoria' => $request['categoria'],
            'valor'=> $valor_1,
            'observacao' => $request['observacao'],
        ]);
        $imovel->update();
        $imoveis = Imoveis::all();
        return view('imoveis.imoveis', compact('imoveis'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pesquisar(Request $request)
    {
        $busca = $request['buscar'];
        $imoveis = Imoveis::whereRaw('codigo like  ?  or titulo like  ?  or categoria like  ?  or valor like  ? ', ["%{$busca}%","%{$busca}%","%{$busca}%","%{$busca}%"])->get();
        return view('imoveis.imoveis', compact('imoveis'));
    }

}
