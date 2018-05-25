<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Save rate
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
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
