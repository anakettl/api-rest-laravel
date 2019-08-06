<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//Eloquent é uma ORM ferramenta de mapeamento de um modelo orientado a objeto para um modelo relacional (do banco de dados), tbm traz de forma relacional do banco de dados e transforma em modelo orientado a objeto

class Produto extends Model{
//para encontrar a tabela o laravel pega o nome desta classe, coloca em minúsculo e no plural, por isso essa linha abaixo não é necessária
	protected $table = 'produtos';
	public $timestamps = false; //criado para não armazenar a data de criação e data de atualização do campo
	protected $fillable = ['lm', 'name', 'free_shipping', 'description' , 'price']; //passa os atributos q são preenchidos pelo método create
}