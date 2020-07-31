<?php


namespace App\Http\Controllers\Sales;


use App\Http\Controllers\Products\ProductException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesValidator
{
    /**
     * @param Request $request
     * @throws \Exception
     */
    public static function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'quantity' => 'required|numeric|min:1'
        ]);
        if ($validator->fails()) {
            throw new SalesException(json_encode($validator->errors()->getMessages()));
        }
    }
}
