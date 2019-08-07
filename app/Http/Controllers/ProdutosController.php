<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\ProdutosExport;
use App\Imports\ProdutosImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Produto;
  
class ProdutosController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('importExport');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export(Request $request) 
    {


        return Excel::download(new ProdutosExport, 'produtos.xlsx');

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
      return response()->json($produtos);
      //var_dump($produtos);
    }


    public function destroy(Request $request)
    {
      Produto::destroy($request->id);
      echo "Produto excluído com sucesso";
    }


    public function update (Request $request)
    {

      
      Produto::whereId($request->id)->update($request->all());
      
      echo "Produto atualizado com sucesso";
    }
}