<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return new Response(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            ProductValidator::create($request);
            $product = new Product();
            $product->name = $request->get('name');
            $product->quantity = $request->get('quantity');
            $product->save();

            return new Response(['message' => 'The entry was stored!']);
        } catch (ProductException $e) {
            return new Response(['error' => json_decode($e->getMessage())], 400);
        } catch (\Exception $e) {
            return new Response(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return new Response(Product::query()->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::query()->find($id);
        $name = $request->get('name');
        $quantity = $request->get('quantity');
        if ($name) {
            $product->name = $name;
        }
        if ($quantity) {
            $product->quantity = $quantity;
        }
        $product->save();

        return new Response($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return new Response(["message" => "item $id was deleted!"]);
    }
}
