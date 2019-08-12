<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Services\RemovedorDeProduto;
use App\Produto;

class RemovedorDeProdutoTest extends TestCase
{
	use DatabaseTransactions;
    public function testRemoverSerie()
    {

        $id=1;
        $this->assertDatabaseHas('produtos',['id'=>$id]);
        $RemovedorDeProduto = new RemovedorDeProduto();
        $RemovedorDeProduto->RemoverProduto($id);

        $this->assertDatabaseMissing('produtos',['id'=>$id]);

    }
}
