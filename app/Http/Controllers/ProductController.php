<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Vanilo\Product\Models\ProductState;

final class ProductController extends Controller
{
    public function create()
    {
        return view('seller.product.create', [
            'states' => ProductState::choices(),
            'product' => app(Product::class)
        ]);
    }

    public function index()
    {
        return view('seller.product.index', [
            'products' => Product::where('user_id', '=', Auth::user()->id)->paginate(20)
        ]);
    }

    public function store(CreateProduct $request)
    {
        try {
            $productArray = $request->except('images');
            $productArray['user_id'] = Auth::user()->id;

            $product = Product::create($productArray);
            flash()->success(__(':name has been created', ['name' => $product->name]));

            try {
                if (!empty($request->files->filter('images'))) {
                    $product->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection();
                    });
                }
            } catch (\Exception $e) { // Here we already have the product created
                flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

                return redirect()->route('vanilo.product.edit', ['product' => $product]);
            }
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('seller.product.index'));
    }

    public function edit(Product $product)
    {
        return view('seller.product.edit', [
            'product'    => $product,
            'states'     => ProductState::choices()
        ]);
    }

    public function update(Product $product, UpdateProduct $request)
    {
        try {
            $product->update($request->all());

            flash()->success(__(':name has been updated', ['name' => $product->name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back()->withInput();
        }

        return redirect(route('seller.product.index'));
    }

    public function destroy(Product $product)
    {
        try {
            $name = $product->name;
            $product->delete();

            flash()->warning(__(':name has been deleted', ['name' => $name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        return redirect(route('seller.product.index'));
    }

    public function detail(Product $product)
    {
        return view('product.detail', ['product' => $product]);
    }
}
