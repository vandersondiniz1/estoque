<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('ProdutoTableSeeder');
    }
}
class ProdutoTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::insert(
            'insert into produtos(nome, quantidade, valor, descricao)
                    values (?,?,?,?)',
            array('Geladeira', 2, 5900, 'Side by Side com gelo na porta')
        );

        DB::insert(
            'insert into produtos (nome, quantidade, valor, descricao)
                    values (?,?,?,?)',
            array('Fogão', 5, 950, 'Painel automático e forno elétrico')
        );

        DB::insert(
            'insert into produtos (nome, quantidade, valor, descricao)
                    values (?,?,?,?)',
            array('Microondas', 1, 1520, 'Manda SMS quando termina de esquentar')
        );
    }
}

