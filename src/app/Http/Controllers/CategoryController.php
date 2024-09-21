<?php

namespace App\Http\Controllers;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use App\Policies\AdminPolicy;
use App\Repositories\CategoryRepository;
use Database\Factories\CategoryFactory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;
    private AdminPolicy $policy;
    public function __construct(ICategoryRepository $repository, AdminPolicy $policy)
    {
        $this->repository = $repository;
        $this->policy = $policy;
    }
    public function all(Request $request)  // можно всем
    {
        return response()->json($this->repository->get(), 200);
    }
    public function find(int $id)  // можно всем
    {
        return response()->json($this->repository->find($id), 200);
    }
    public function create(Request $request)  // только админ
    {
        $data = $request->all();
        $this->policy->checkPermission($request);
        return response()->json($this->repository->create($data), 200);

    }
    public function update(Request $request, int $id)  // только админ
    {
        $data = $request->all();
        $this->repository->update($id, $data);
        return response()->json($this->repository->find($id), 200);

    }
    public function delete(int $id, Request $request)  // только админ
    {
        $this->repository->delete($id);
        $this->policy->checkPermission($request);
        return response()->json($this->repository->get(), 200);
    }
}
