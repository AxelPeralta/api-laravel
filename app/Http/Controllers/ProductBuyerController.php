<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductBuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $buyers=$product->transactions()
        ->with('buyer')
        ->get()
        ->pluck('buyer')
        ->unique('id')
        ->values();
        return response()->json($buyers);
    }
}
