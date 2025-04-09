<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductApiController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::with('images')->get());
    }
}
