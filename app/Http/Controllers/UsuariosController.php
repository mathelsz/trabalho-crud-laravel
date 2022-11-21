<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['usuarios'] = DB::table('usuarios')->select('id', 'nome', 'email', 'idade', 'telefone')->get();
        return view('listar', $data);
    }


    public function create()
    {
        return view('novo');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       {
            DB::table('usuarios')->insert([
                'nome' => $request->nome,
                'email' => $request->email,
                'idade' => $request->idade,
                'telefone' =>$request->telefone
            ]);
            return redirect('/usuarios')->with('mensagem', 'Usuário cadastrado!');
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
        if (! $data['usuarios'] = DB::table('usuarios')->where('id', $id)->first()) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }

        return view('detalhes', $data);
    }

    public function edit($id)
    {
        $usuario = DB::table('usuarios')->where('id', $id)->first();
        return view('editar', ['usuario' => $usuario]);
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
        if (! $usuario = DB::table('usuarios')->where('id', $id)->first()) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nome'     => 'required|min:3',
            'email'    => 'email|unique:usuarios,email,' .$usuario->id,
            'idade'    => 'required:min:3',
            'telefone' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensagem' => 'Problemas encontrados.'], 422);
        } else {
            $data = [
                'nome'     => $request->nome,
                'email'    => $request->email,
                'idade'    => $request->idade,
                'telefone' => $request->telefone
            ];

            DB::table('usuarios')->where('id', $id)->update($data);
            return redirect('/usuarios')->with('mensagem', 'Usuário alterado!');
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
        if (! $usuario = DB::table('usuarios')->where('id', $id)->first()) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }

        DB::table('usuarios')->where('id', $id)->delete();
        return redirect('/usuarios')->with('mensagem', 'Usuário excluído!');
    }
}
