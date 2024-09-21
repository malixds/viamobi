<?php

namespace App\Repositories;

use App\Filters\FilterRange;
use App\Interfaces\IProductRepository;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductRepository implements IProductRepository
{
    public function get($query): LengthAwarePaginator
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters(
                [
                    'category_id',
                    AllowedFilter::custom('price', new FilterRange('price')),
                ])
            ->allowedSorts('price')
            ->paginate()
            ->appends($query);
    }

    public function find(int $id): ?Product
    {
        return Product::query()->find($id);
    }

    public function create(array $data): ?Product
    {
        return Product::query()->create($data);
    }

    public function update(int $id, array $data): void
    {
        Product::query()->find($id)->update($data);
    }

    public function delete(int $id): void
    {
        Product::query()->find($id)->delete();
    }
}
