<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['id_supplier'];
    protected $primaryKey = 'id_supplier';
    
    public function item(){
        return $this->hasMany(Item::class);
    }
}
