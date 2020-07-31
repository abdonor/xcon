<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Sales\SalesException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductValidator
{
    /**
     * @param Request $request
     * @throws \Exception
     */
    public static function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'quantity' => 'required|integer'
        ]);
        if ($validator->fails()) {
            throw new ProductException(json_encode($validator->errors()->getMessages()));
        }
    }
}
