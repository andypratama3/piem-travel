<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passport extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'passports';
    protected $fillabel = [
        'ktp', 'kk', 'akta_kelahiran', 'ijazah', 'surat_kawin', 'passport', 'status', 'slug',
    ];

    protected $dates = ['deleted_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
