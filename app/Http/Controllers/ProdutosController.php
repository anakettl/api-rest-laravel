<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\ProdutosExport;
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
   
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function export(Request $request) 
    // {


    //     return Excel::download(new ProdutosExport, 'produtos.xlsx');

    // }
   
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
      return response()->json($produtos);
      //var_dump($produtos);
    }


    // public function destroy(Request $request)
    // {
    //   Produto::destroy($request->id);
    //   echo "Produto excluído com sucesso";
    // }


    public function destroy(Request $request, RemovedorDeProduto $RemovedorDeProduto)
    {

      $nomeProduto = $RemovedorDeProduto->RemoverProduto($request->id);
      echo "Produto excluído com sucesso";
    }

    public function update (Request $request, AtualizadorDeProduto $AtualizadorDeProduto)
    {
      $produto = $AtualizadorDeProduto->AtualizarProduto(
            $request->id, 
            $request->lm,
            $request->name, 
            $request->free_shipping,
            $request->description, 
            $request->price);

    echo "Produto atualizado com sucesso";
    }






    // public function update (Request $request)
    // {

      
    //   Produto::whereId($request->id)->update($request->all());
      
    //   echo "Produto atualizado com sucesso";
    // }
}