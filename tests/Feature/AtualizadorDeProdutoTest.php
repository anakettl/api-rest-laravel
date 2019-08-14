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
   
    $id=1;

    $dados = [ 
                'id'=>1,
                'lm'=>2090,
                'name'=>'Produto 1',
                'free_shipping'=>'0',
                'description'=>'Produto de qualidade',
                'price'=>'20.0'
             ];
    $lm = array_column($dados, 'lm');
    $name = array_column($dados, 'name');
    $free_shipping = array_column($dados, 'free_shipping');
    $description = array_column($dados, 'description');
    $price = array_column($dados, 'price');




    $this->assertDatabaseHas('produtos',['id'=>$id]);

        $AtualizadorDeProduto = new AtualizadorDeProduto();
        $produtoAtualizado = $AtualizadorDeProduto->AtualizarProduto($id, $dados);
        $produtoBanco = Produto::find($id)->toArray();

    $lmBanco = array_column($produtoBanco, 'lm');
    $nameBanco = array_column($produtoBanco, 'name');
    $free_shippingBanco = array_column($produtoBanco, 'free_shipping');
    $descriptionBanco = array_column($produtoBanco, 'description');
    $priceBanco = array_column($produtoBanco, 'price');


    
   
     $this->assertEquals($lm, $lmBanco);
     $this->assertEquals($name, $nameBanco);
     $this->assertEquals($name, $free_shippingBanco);
     $this->assertEquals($name, $descriptionBanco);
     $this->assertEquals($name, $priceBanco);



   }
   
}
