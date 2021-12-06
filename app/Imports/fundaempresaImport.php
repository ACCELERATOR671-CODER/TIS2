<?php

namespace App\Imports;

use App\Models\FundaEmpresa;
use Maatwebsite\Excel\Concerns\ToModel;

class fundaempresaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FundaEmpresa([
            'nombreCorto'      => (isset($row[0])  ) ? $row[0] : '',
            'nombreLargo'     => (isset($row[1]) ) ? $row[1] : '',
            'gestion'       => (isset($row[2]) ) ? $row[2] : '',
            'docente'       => (isset($row[3]) ) ? $row[3] : '',
        ]);
    }
}
