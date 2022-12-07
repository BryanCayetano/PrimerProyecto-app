<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso_profesor extends Model
{
    use HasFactory;
    
    protected $table = "profesores";

    protected $fillable = [
        'nombre',
        'apellido',
        'dni'
    ];

    public function cursos()
    {
        return $this->hasMany('App\Models\Curso');
    }
}