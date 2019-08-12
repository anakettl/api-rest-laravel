<?php
   
namespace App\Services;

use App\Produto;

class AtualizadorDeProduto {

	public function AtualizarProduto(
		int $id, 
		int $lm, 
		string $name, 
		int $free_shipping, 
		string $description, 
		float $price) 
	{
		Produto::whereId($id)->update([
			'lm'=>$lm,
			'name'=>$name,
			'free_shipping'=>$free_shipping,
			'description' => $description,
			'price' => $price
		]);
	          
	}

}