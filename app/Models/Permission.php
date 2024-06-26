<?php
namespace App\Models;

use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;
    use HasUuids, NameHasSlug;
    protected $primaryKey = 'uuid';

    protected $fillable = [
        'name',
        'guard_name',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
