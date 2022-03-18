<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'sub_category_id',
        'title',
        'slug',
        'price',
        'description'
    ];

    public function subCategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id', 'id');
    }

}
