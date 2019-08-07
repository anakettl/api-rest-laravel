<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\ProdutosExport;
use App\Imports\ProdutosImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Produto;

use App\User;
  
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


        return Excel::download(new ProdutosExport, 'users.xlsx');
           //  $produtos=Produto::query()
           // ->get()
           // ->all();


           // foreach ($produtos as $produto ) {
           //    return response()->json($produto);
           //    //echo $produto;
           // }
           
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {

      // try {

      //       if (!$request->hasFile('file')) {
      //         echo "Arquivo não encontrado";
      //           //return response()->json(['message' => 'Arquivo não encontrado']);
      //       } else {
              Excel::import(new ProdutosImport,request()->file('file'));
              echo "Planilha executada com sucesso";
           // }
        

        //return back();
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
      echo "Produto {id} excluído com sucesso";
    }


    // public function show(Request $request)
    // {

    //   return $id;
    //   // $produto = Produto::query()
    //   // return $id;
    // }

    public function update (Request $request)
    {
      //Produto::update($request->id);
      
      Produto::whereId($request->id)->update($request->all());
      
      echo "Produto {id} atualizado com sucesso";
    }
}