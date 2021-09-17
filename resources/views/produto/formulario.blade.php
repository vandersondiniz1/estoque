@extends('layout.principal')
@section('conteudo')
<h1>Novo produto</h1>
<form action="/produtos/adiciona" method="post">
    <!-- Evita CSRF ataque  -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-group">
        <label>Nome</label>
        <input name="nome" class="form-control">
    </div>
    <div class="form-group">
        <label>Descricao</label>
        <input name="descricao" class="form-control">
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" class="form-control">
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input name="quantidade" type="number" class="form-control">
    </div>
    <button type="submit" class="btn
btn-primary btn-block">Submit</button>
</form>
@stop