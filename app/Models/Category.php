<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
namespace App\Models;
class Category extends Model
{
    use HasFactory;

    protected $table = "crud_category";
    
    protected $fillable = [
        'name',
        'description'
    ];

}