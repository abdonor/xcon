<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Product;
use App\Sale;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return new Response(Sale::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function sale(Request $request)
    {
        try {
            SalesValidator::create($request);
            $productId = $request->get('product_id');
            $quantity = $request->get('quantity');
            $product = Product::query()->find($productId);
            $userId = Auth::id();
            if ($quantity > $product->quantity) {
                throw new SalesException(json_encode([
                    'quantity' => ['The quantity is not available for this product!']
                ]));
            }
            $sale = New Sale();
            $sale->quantity = $quantity;
            $sale->user_id = $userId;
            $sale->product_id = $product->id;
            $product->quantity = ($product->quantity - $quantity);
            $product->save();
            $sale->save();

            return new Response($sale);
        } catch (SalesException $e) {
            return new Response(['error' => json_decode($e->getMessage())], 400);
        } catch (\Exception $e) {
            return new Response(['error' => $e->getMessage()], 400);
        }
    }
}
