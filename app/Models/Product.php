<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Traits\HasScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasSlug, HasScope;

    protected $fillable = [
        'category_id', 'supplier_id', 'name', 'slug', 'description', 'stok_awal', 'quantity', 'image', 'unit'
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => asset('storage/products/' . $image),
        );
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
