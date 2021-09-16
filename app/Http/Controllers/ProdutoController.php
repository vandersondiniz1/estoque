<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
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
}
