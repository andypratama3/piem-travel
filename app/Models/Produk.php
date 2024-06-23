<?php

namespace App\Models;

use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produk extends Model
{
    use HasFactory;
    use HasUuids, NameHasSlug;

    protected $table = 'produks';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'stock',
        'type',
        'periode',
        'status',
        'slug',
    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'produks_categorys');
    }
}
