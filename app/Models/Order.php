<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'table_order';
    protected $primaryKey = 'id';
    protected $fillable = [
        "user_id",
        "amount",
        "status",
        "strip_id",
    ];

    public function products(){
        return $this->hasMany(OrderProduct::class);
    }
}
