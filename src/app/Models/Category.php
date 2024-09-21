<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public static array $categoriesList = ['Phone', 'Food', 'Travel', 'Health', 'Education'];

    protected $guarded = false;

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function product(): hasMany
    {
        return $this->hasMany(Product::class);
    }
}
