<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [
        'id_item'
    ];
    protected $primaryKey = 'id_item';

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
