<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\ABC;
use Validator;
use App\Http\Resources\Product as ProductResource;

class AbcController extends BaseController
{
   
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $product = ABC::create($input);
   
        return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
    } 
}
