<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cliente;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Cliente::orderBy('nome')->get();
        //return view('welcome', $data);
        return Cliente::orderBy('nome')->get();
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
        $data = new Cliente;

        $data->nome = $request->nome;
        $data->cpf = $request->cpf;
        $data->data_nascimento = $request->data_nascimento;
        $data->sexo_id = $request->sexo_id;
        $data->endereco = $request->endereco;
        $data->cidade_id = $request->cidade_id;
        $data->estado_id = $request->estado_id;

        if($data->save()){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cliente::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Cliente::find($id);

        $data->nome = $request->nome;
        $data->cpf = $request->cpf;
        $data->data_nascimento = $request->data_nascimento;
        $data->sexo_id = $request->sexo_id;
        $data->endereco = $request->endereco;
        $data->cidade_id = $request->cidade_id;
        $data->estado_id = $request->estado_id;

        if($data->save()){
            return 1;
        }else{
            return 2;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Cliente::find($id);

        if($data->delete()){
            return 1;
        }else{
            return 2;
        }
    }
}
