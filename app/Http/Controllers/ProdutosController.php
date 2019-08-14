<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Imports\ProdutosImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Produto;
use App\Services\AtualizadorDeProduto;
use App\Services\RemovedorDeProduto;


  
class ProdutosController extends Controller
{
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importView()
    {
       return view('import');
    }
   
      
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
      $request->validate
      ([
         'file' => 'required'
      ]);

       Excel::import(new ProdutosImport,request()->file('file'));
       echo "Planilha executada com sucesso";
    }

    public function index ()
    {
      $produtos = Produto::all();
      return response()
      ->json($produtos);     
    }

    public function show(int $id)
    {    
      $produto = Produto::find($id);
      try {
            if(!$produto) 
            {
              return response()
              ->json(['msg'=>'Produto nao encontrado!'],404);
            } 
            else 
            {
              return response()
              ->json($produto);
            }
          }
      catch (\Exception $e){
            if(config('app.debug'))
            {
              return response()
              ->json($e->getMessage(),1012);
            } 
            else 
            {
              return response()
              ->json(['msg'=> 'Houve um erro ao mostrar o produto'],1012);
            }     
          }
    }



    public function destroy(int $id, Request $request, RemovedorDeProduto $RemovedorDeProduto)
    {
        
    $produto = Produto::find($id);
   
    try {
            if(!$produto) 
            {
              return response()->json(['msg'=>'Produto nao encontrado!'],404);
            } 
            else 
            {
              $nomeProduto = $RemovedorDeProduto->RemoverProduto($id);
              return response()
              ->json(['msg'=> 'Produto excluido com sucesso'],200);
            }
          }

    catch (\Exception $e){
            if(config('app.debug'))
            {
              return response()->json($e->getMessage(),1011);
            } 
            else 
            {
              return response()
              ->json(['msg'=> 'Houve um erro ao excluir o produto'],1011);
            }     
          }
    }



    public function update (int $id, Request $request, AtualizadorDeProduto $AtualizadorDeProduto)
    {
      $id = $request->id;
      $produto = Produto::find($id);
       try {
            if(!$produto) 
            {
              return response()->json(['msg'=>'Produto nao encontrado!'],404);
            } 
            else 
            {
              $dados = $request->all();

              if(!$dados)
              {
                return response()->json(['msg'=>'Digite ao menos um valor'],404);
              }
              else 
              {
                $produto = $AtualizadorDeProduto
                ->AtualizarProduto($id, $dados);
                return response()
                ->json(['msg'=> 'Produto atualizado com sucesso'],200);

              }

            }
          }

      catch (\Exception $e){
            if(config('app.debug'))
            {
              return response()->json($e->getMessage(),500);
            } 
            else 
            {
              return response()
              ->json(['msg'=> 'Houve um erro ao atualizar o produto'],1010);
            }   
          }
     
   
    }

}