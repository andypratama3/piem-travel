<?php

namespace App\Models;

use App\Models\Category;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, NameHasSlug, HasUuids;

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
