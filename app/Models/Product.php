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

    public function scopeCategory($query, $request) {
        if($request->has('category_id')){
            $query->where('category_id', $request->category_id);
        }
    }

    public function scopeName($query, $request){
        if ($request->has('keyword')) {
            $query->where('title', 'LIKE', '%'.$request->keyword.'%');
        }
        return $query;
    }

    public function scopeSortPrice($query, $request){
        if($request->sort_price=='asc' || $request->sort_price=='desc'){
            return $query->orderBy('sell_value', $request->sort_price);
        }
    }

    public function scopeNewProducts($query, $request){
        if($request->new_products== true){
            return $query->latest();
        }
    }

    public function scopeSale($query, $request){

    }

}
