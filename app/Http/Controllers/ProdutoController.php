<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Produto;
use App\Http\Requests\ProdutosRequest;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{

    //Eloquent ORM
    public function lista()
    {
        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }

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

    public function remove()
    {
        if (Auth::guest()) {
            return redirect('login');
        }
        $id = Request::input('id', '0');
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }
}
