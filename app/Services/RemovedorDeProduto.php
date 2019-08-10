<?php
   
namespace App\Services;

use App\Produto;


class RemovedorDeProduto 
{
	
	public function RemoverProduto(int $id)
	{
		Produto::destroy($id);
	}
	
}