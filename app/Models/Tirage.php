<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tirage extends Model{
    use HasFactory;
    protected  $fillable = ['tirage'];
    public $timestamps = false;
}
