<?php

namespace App\Exports;

use App\Models\Empresas;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmpresasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Empresas::all();
    }
}
