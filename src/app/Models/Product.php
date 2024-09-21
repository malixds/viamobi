<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
