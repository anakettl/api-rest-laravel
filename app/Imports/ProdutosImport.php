<?php
   
namespace App\Imports;
   
use App\Produto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class ProdutosImport implements ToModel, WithHeadingRow, withChunkReading
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
