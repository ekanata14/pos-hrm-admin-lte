<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [
        'id_cart'
    ];
    protected $primaryKey = 'id_cart';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
