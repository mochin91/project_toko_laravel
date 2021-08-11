<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsToMany(User::class,'product_users')
            ->withPivot('qty','status','created_at')
            ->withTimestamps();
    }

    public function Order()
    {
        return $this->belongsToMany(Order::class,'details_orders')
            ->withPivot('qty','price','total','created_at');
    }
}
