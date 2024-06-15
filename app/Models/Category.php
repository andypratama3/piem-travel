<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public function produks(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'produks_categorys');
    }
}
