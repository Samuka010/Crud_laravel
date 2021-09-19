<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinhaUrl extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'situacao', 'html', 'data_verifica'];
}
