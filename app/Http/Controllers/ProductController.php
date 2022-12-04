<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::orderBy('title', 'asc')->get();
        return view('product.index', $data);
    }

    public function create()
    {
        $data['attributes'] = Attribute::orderBy('title', 'asc')->get();
        return view('product.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $product = Product::create($request->only('title', 'description', 'status'));
        foreach($request->variation as $item) {
            $product_variant = $product->productVariants()->create([
                'price' => $item['price'],
                'stock' => $item['stock']
            ]);
            $product_variant->attributes()->attach($item['attribute']);
            foreach($item['price_set'] as $item2) {
                $product_variant_set = $product_variant->sets()->create([
                    'set' => $item2['set'],
                    'price' => $item2['price']
                ]);
            }
        }
        DB::commit();
        return redirect()->route('product.index'); 
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $data['product'] = $product;
        return view('product.edit', $data);
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('product.index'); 
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index'); 
    }
}
