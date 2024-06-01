<?php

namespace App\Http\Controllers\Api;

use App\Models\ParkirKeluar;
use App\Models\AkumulasiParkir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ParkirResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class PostKeluarController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // Get all parkir keluar data
        $parkirKeluar = ParkirKeluar::latest()->paginate(5);

        // Return collection of parkir keluar as a resource
        return new ParkirResource(true, 'List Data Parkir Keluar', $parkirKeluar);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {

        $token = $request->bearerToken();
        $expectedToken = env('API_BEARER_TOKEN');

        if ($token !== $expectedToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'id_kartu' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Konversi format tanggal dan waktu jika validasi berhasil
        //$request->merge(['jam_keluar' => date('Y-m-d H:i:s', strtotime($request->jam_keluar))]);


        // Create parkir keluar data
        $parkirKeluar = ParkirKeluar::create([
            'id_kartu'     => Str::random(12),
            'no_polisi'     => 'B'.random_int(1000,9999).'XXX',
            'jam_keluar'   => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // Update akumulasi parkir data
        $akumulasiParkir = AkumulasiParkir::latest()->first();
        if ($akumulasiParkir) {
            if($akumulasiParkir->total_kendaraan_parkir <= 0){
                return response()->json([
                    'success' => true,
                    'data' => 'Kendaraan Parkir Kosong',
                ], 200);
            }
                $akumulasiParkir->total_kendaraan_parkir -= 1;
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
            'success' => true,
            'data' => $parkirKeluar,
        ], 200);
    }
}
