<?php
   
namespace App\Services;

use App\Produto;

class AtualizadorDeProduto {

	public function AtualizarProduto(
		int $id,
		array $dados)
	
	{	
		Produto::whereId($id)
		->update($dados);       
	}

}