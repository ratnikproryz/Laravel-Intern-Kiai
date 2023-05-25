<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAll();
        return $products;
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $product = $this->productRepository->create($request->all());
        return $product;
    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);
        return $product;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $result = $this->productRepository->update($id, $request->all());
        return $result;
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);
    }
}
