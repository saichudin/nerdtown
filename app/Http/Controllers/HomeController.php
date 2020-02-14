<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Vanilo\Product\Models\ProductState;

class HomeController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->where('state', ProductState::ACTIVE)->orderBy('created_at')->paginate(20);

        return view('product.index', ['products' => $products]);
    }
}
