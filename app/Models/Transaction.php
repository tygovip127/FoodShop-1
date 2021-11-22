<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable =[
        'id', 
        'number',
        'total',
        'customer_name',
        'customer_contact',
        'deliver_address',
        'user_id',
    ];
}
