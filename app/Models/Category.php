<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Traits\HasScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasSlug, HasScope;

    protected  $fillable = [
        'name', 'slug', 'image'
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => asset('storage/categories/' . $image),
        );
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
