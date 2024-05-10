<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function getCategory()
    {
        return DB::table('categories')->get();
    }
}
