<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemInOut extends Model
{
    use HasFactory;
    protected $guarded = [ 'id_item_in_out' ];
    protected $primaryKey = 'id_item_in_out';

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Item(){
        return $this->belongsTo(Item::class);
    }

    public function Cart(){
        return $this->belongsTo(Cart::class);
    }
}
