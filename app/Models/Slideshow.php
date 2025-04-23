<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;
    protected $table = 'table_slideshow';
    protected $primaryKey = 'ssid';
    protected $fillable = [
        'title',
        'img',
        'enable',
        'ssorder',
    ];
}
