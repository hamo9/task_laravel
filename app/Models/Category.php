<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function scopeFilter($query, $search)
    {

        $query->where('name', 'like', '%' . $search->search . '%');

    }

}
