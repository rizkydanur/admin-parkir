<?php

namespace App\Http\Controllers\Api;

use App\Models\ParkirMasuk;
use App\Models\AkumulasiParkir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ParkirResource;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Validator;

class PostMasukController extends Controller
{
    /**
     * index
     *
     * @return void
     */
   public function index()
   {
       //get all posts
       $parkirmasuk = ParkirMasuk::latest()->paginate(5);

       //return collection of posts as a resource
       return new ParkirResource(true, 'List Data Posts', $parkirmasuk);
   }

   /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
         // Periksa apakah bearer token cocok dengan yang diharapkan
         $token = $request->bearerToken();

         $expectedToken = env('API_BEARER_TOKEN');

         if ($token !== $expectedToken) {
             return response()->json(['message' => 'Unauthorized'], 401);
         }

        //define validation rules
        $validator = Validator::make($request->all(), [
            'id_kartu'     => 'required',
       
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $parkirmasuk = ParkirMasuk::create([
            'id_kartu'     => Str::random(12),
            'no_polisi'     => 'B'.random_int(1000,9999).'XXX',
            'jam_masuk'   => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // Update akumulasi parkir data
        $akumulasiParkir = AkumulasiParkir::latest()->first();
        if ($akumulasiParkir) {
            if($akumulasiParkir->total_kendaraan_parkir >= 144){
                return response()->json([
                    'success'=>true,
                    'data'=>'Maaf Parkir Penuh...',
                ],200);
            }
            $akumulasiParkir->total_kendaraan_parkir += 1;
            $totalSlotParkir = $akumulasiParkir->total_slot_parkir;
            $totalKendaraanParkir = $akumulasiParkir->total_kendaraan_parkir;
            $totalParkirTersedia = $totalSlotParkir - $totalKendaraanParkir;
            $akumulasiParkir->total_parkir_tersedia = $totalParkirTersedia;
            $akumulasiParkir->save();
        } else {
            AkumulasiParkir::create([
                'total_kendaraan' => 1,
            ]);
        }

        return response()->json([
            'success'=>true,
            'data'=>$parkirmasuk,
        ],200);
    }
}
