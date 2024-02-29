<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $guarded = [ 'id_checkout' ];
    protected $primaryKey = 'id_checkout';

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Cart(){
        return $this->belongsTo(Cart::class);
    }
}
