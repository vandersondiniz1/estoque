<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Produto;
use App\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller
{

    //Eloquent ORM
    public function lista()
    {
        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }

    /*  public function lista()
    {
        $produtos = DB::select('select * from produtos');
        return view('produto.listagem')->withProdutos($produtos); //magic method
    } 
    */

    //Retorna um json implicitamente
    public function listaJson()
    {
        $produtos = Produto::all();
        return $produtos;
    }

    //Retorna um json explicitamente
    public function listaJsonExplicitamente()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function mostra()
    {
        $id = Request::input('id', '0');
        $produto = Produto::find($id);
        if (empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $produto);
    }

    /*  public function mostra()
    {
        $id = Request::input('id', '0');
        $resposta = DB::select('select * from produtos where id = ?', [$id]);

        if (empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta[0]);
    } */

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona(ProdutosRequest $request)
    {
        Produto::create($request->all());
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }


    /* a */

    /*  public function adiciona()
    {
        Produto::create(Request::all());
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    } */

    /* public function adiciona()
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
    } */

    //TODO: criar um metodo para editar os produtos

    public function remove()
    {
        $id = Request::input('id', '0');
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }
}
