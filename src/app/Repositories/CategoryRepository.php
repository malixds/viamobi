<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements ICategoryRepository
{
    public function get(): ?Collection
    {
        return Category::all();
    }
    public function find(int $id): ?Category
    {
        return Category::query()->find($id);
    }
    public function create(array $data): ?Category
    {
        return Category::query()->create($data);
    }
    public function update(int $id, array $data): void
    {
        Category::query()->find($id)->update($data);
    }
    public function delete(int $id): void
    {
        Category::query()->find($id)->delete();
    }

}
