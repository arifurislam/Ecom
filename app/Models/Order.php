<?php

namespace App\Models;

use App\Models\Shipping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    
    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }
}
