<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Goods extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'restock_value',
        'size',
        'sell_value',
        'subtitle',
        'rate',
        'view',
    ];

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }   
}
