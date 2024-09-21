<?php

namespace App\Http\Controllers;

use App\Interfaces\IProductRepository;
use App\Models\Product;
use App\Policies\AdminPolicy;
use App\Repositories\ProductRepository;
use Database\Factories\ProductFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $repository;
    private AdminPolicy $policy;

    public function __construct(IProductRepository $repository, AdminPolicy $policy)
    {
        $this->repository = $repository;
        $this->policy = $policy;
    }

    // /products?sort=-price&filter[price][from]=100&filter[price][to]=2000
    public function get(Request $request): JsonResponse
    {
        $result = $this->repository->get($request->query());
        return response()->json($result);
    }

    public function find(int $id): JsonResponse
    {
        return response()->json($this->repository->find($id), 200);
    }

    public function create(Request $request): JsonResponse
    {
        $this->policy->checkPermission($request);
        $data = $request->all();
        return response()->json($this->repository->create($data), 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $this->policy->checkPermission($request);
        $data = $request->all();
        $this->repository->update($id, $data);
        return response()->json($this->repository->find($id), 200);
    }

    public function delete(Request $request, int $id): JsonResponse
    {
        $this->policy->checkPermission($request);
        $this->repository->delete($id);
        return response()->json('Ok');
    }
}
