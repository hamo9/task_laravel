<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
    ];

    public function Category() : BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }


    public function scopeFilter($query, $search)
    {

        $query->where('name', 'like', '%' . $search->search . '%');

    }
}
