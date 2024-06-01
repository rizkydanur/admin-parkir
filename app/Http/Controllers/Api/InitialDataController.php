<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AkumulasiParkir;

class InitialDataController extends Controller
{
    public function index(){
        $result = AkumulasiParkir::first();
        return response()->json([
            'success'=>true,
            'data'=>$result,
        ]);
    }
}
 