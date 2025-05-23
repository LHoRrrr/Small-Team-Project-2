<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'pid';
    protected $fillable = [
        "pname",
        "pdesc",
        "price",
        "image",
        "enable",
        "porder"
    ];
}
