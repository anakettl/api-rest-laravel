<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\AtualizadorDeProduto;
use App\Produto;

class AtualizadorDeProdutoTest extends TestCase
{

    

   public function testAtualizarProduto()
   {


    
     $produto = [$id=2,
                $lm=2090,
                $name='Produto 1',
                $free_shipping=0,
                $description='produto blablabla',
                $price=199.90];

        

        $AtualizadorDeProduto = new AtualizadorDeProduto();
        $produtoAtualizado = $AtualizadorDeProduto->AtualizarProduto(
            $id,
            $lm,
            $name,
            $free_shipping,
            $description,
            $price);


    $this->assertDatabaseHas('produtos',['id'=>2,
                                        'lm'=>2090,
                                        'name'=>'Produto 1',
                                        'free_shipping'=>0,
                                        'description'=>'produto blablabla',
                                        'price'=>199.90,
                                        ]);
   }
   
}
