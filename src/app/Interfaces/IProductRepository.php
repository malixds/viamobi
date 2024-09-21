<?php

namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface IProductRepository
{
    public function get($query): LengthAwarePaginator;
    public function find(int $id): ?Product;
    public function create(array $data): ?Product;
    public function update(int $id, array $data): void;
    public function delete(int $id): void;
}
