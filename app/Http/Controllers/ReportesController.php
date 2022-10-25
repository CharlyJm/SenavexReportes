<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReportesFormRequest;
use App\Models\Users; 

class ReportesController extends Controller
{
 public function lista(){

        // return 'hola';
        try {
            return User::all();

        } catch (\Throwable $th) {
            dump($th);

        }
    }
 
}
