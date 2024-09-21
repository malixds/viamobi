<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface ICategoryRepository
{
    public function get(): ?Collection;
    public function find(int $id): ?Category;
    public function create(array $data): ?Category;
    public function update(int $id, array $data): void;
    public function delete(int $id): void;
}
