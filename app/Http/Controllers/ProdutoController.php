<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ProdutoController extends Controller
{
    public function lista()
    {
        $produtos = DB::select('select * from produtos');
        return view('produto.listagem')->withProdutos($produtos); //magic method
    }

    public function mostra()
    {
        $id = Request::input('id', '0');
        $resposta = DB::select('select * from produtos where id = ?', [$id]);

        if (empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta[0]);
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona()
    {
        // $all = Request::all();
        // $only = Request::only('nome', 'valor', 'quantidade');
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        $resposta = DB::insert(
            'insert into produtos (nome, quantidade, valor, descricao) values (?,?,?,?)',
            array($nome, $quantidade, $valor, $descricao)
        );

        return redirect('/produtos')
            ->withInput(Request::only('nome'));
    }
}
