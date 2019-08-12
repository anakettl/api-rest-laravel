<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Services\AtualizadorDeProduto;
use App\Produto;

class AtualizadorDeProdutoTest extends TestCase
{
    use DatabaseTransactions;
    

   public function testAtualizarProduto()
   {


    
     $produto = [$id=1,
                $lm=2090,
                $name='Produto 1',
                $free_shipping=0,
                $description='Otimo produto',
                $price=199.90];

        

        $AtualizadorDeProduto = new AtualizadorDeProduto();
        $produtoAtualizado = $AtualizadorDeProduto->AtualizarProduto(
            $id,
            $lm,
            $name,
            $free_shipping,
            $description,
            $price);


    $this->assertDatabaseHas('produtos',['id'=>$id,
                                        'lm'=>$lm,
                                        'name'=>$name,
                                        'free_shipping'=>$free_shipping,
                                        'description'=>$description,
                                        'price'=>$price,
                                        ]);
   }
   
}
