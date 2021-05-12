<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    use HasFactory;

    protected $table = 'imoveis';
    public $timestamps = true;


    protected $fillable = [
        'codigo',
        'foto_capa',
        'titulo',
        'categoria',
        'valor',
        'observacao'
    ];

}
