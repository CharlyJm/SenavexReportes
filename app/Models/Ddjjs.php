<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ddjjs extends Model
{
    use HasFactory;

    protected $table = 'ddjjs';
    protected $primaryKey = 'id_ddjj';
    public $timestamps = true;
   //   protected $fillable=[
   //      'razon_social',
   //      'nombre_comercial',
   //      'nit'
   //   ];

}
