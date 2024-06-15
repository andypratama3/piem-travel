<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    use HasUuids;
    
    protected $table = 'produks';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'slug',
    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Produk::class, 'produks_categorys');
    }
}
