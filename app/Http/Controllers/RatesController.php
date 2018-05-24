<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function store(Request $request)
    {
        $rate = new Rate();
        
        $rate->fill($request->all());
        
        if ($rate->save()) {
            return response()->json([
                'response' => 'success',
                'message'  => 'Rate successfully'
            ]);
        } else {
            return response()->json([
                'response' => 'error',
                'message'  => 'Error to rate'
            ]);
        }
    }
}
