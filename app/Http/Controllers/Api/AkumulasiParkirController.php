<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParkirResource;
use App\Models\ParkirMasuk;
use App\Models\AkumulasiParkir;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpMqtt\Client\Facades\MQTT;

class AkumulasiParkirController extends Controller
{
    public function index()
    {
      
      $akumulasiParkir = AkumulasiParkir::latest()->paginate(5);
      return response()->json([
        'success'=>200,
        'data'=>$akumulasiParkir,
      ]);
      //return new ParkirResource(true, 'List Data Posts', $akumulasiParkir);
    }

}
