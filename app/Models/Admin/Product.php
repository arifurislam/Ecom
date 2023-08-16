<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlist;

class Product extends Model
{
    protected $fillable = [
        'cat_id','brand_id','name','code','quantity','short_des','long_des','price','media1','media2','media3','status',
    ];
    use HasFactory;

    public function carts(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }

    public function orders(){
        return $this->hasMany(OrderDetails::class, 'product_id', 'id');
    }
}
