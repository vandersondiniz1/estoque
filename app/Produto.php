<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * a classe Produto representará a tabela produtos que será
 * criada no banco de dados
 */
class Produto extends Model
{
    protected $table = 'produtos';
    public $timestamps = false;
    //MassAssignmentException
    protected $fillable = array(
        'nome',
        'descricao',
        'valor',
        'quantidade'
    );
}
