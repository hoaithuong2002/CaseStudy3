<?php


namespace App\Http\Services;

use App\Http\Repositories\ProductRepository;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class ProductService extends BaseService
{
    protected ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }
    function getAll()
    {
        return $this->productRepo->getAll();
    }
    function getById($id)
    {
        return $this->productRepo->findById($id);
    }
    function store($request){
        $product = new Product();
        $product->fill($request->all());
        $product->password = Hash::make($request->password);
        $path = $this->updateLoadFile($request, 'image', 'avatar');
        $product->image = $path;
        $roles = $request->role_id;
        $this->productRepo->store($product, $roles);
    }
    function update($product, $request)
    {
        $product->fill($request->all());
        $roles = $request->role_id;
        $this->productRepo->store($product, $roles);
    }
}
