<?php
   
namespace App\Imports;
   
use App\Produto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use App\Imports\ProdutosImport;
    
class ProdutosImport implements ToModel, WithHeadingRow, withChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Produto([
            'lm'     => $row['lm'],
            'name'    => $row['name'], 
            'free_shipping' => $row['free_shipping'],
            'description' => $row['description'],
            'price' => $row['price'],
        ]);
    }

    public function headingRow()
    {
        return 3;
    }
    public function chunkSize(): int
    {
        return 1000;
    }


}
