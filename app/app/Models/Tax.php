<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'type', 'coeficient', 'yearly_tax', 'result', 'created_at', 'updated_at'];

    protected $table = 'taxes';
}
