<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
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
        'feature_image_path'
    ];

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }   

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
