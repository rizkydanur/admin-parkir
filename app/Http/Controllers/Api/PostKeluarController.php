<?php

namespace App\Http\Controllers\Api;

use App\Models\ParkirKeluar;
use App\Models\AkumulasiParkir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ParkirResource;
use Illuminate\Support\Facades\Validator;

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
            'no_polisi' => 'required',
            'jam_keluar' => 'required|date',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Konversi format tanggal dan waktu jika validasi berhasil
        $request->merge(['jam_keluar' => date('Y-m-d H:i:s', strtotime($request->jam_keluar))]);


        // Create parkir keluar data
        $parkirKeluar = ParkirKeluar::create([
            'id_kartu' => $request->id_kartu,
            'no_polisi' => $request->no_polisi,
            'jam_keluar' => $request->jam_keluar,
        ]);

        // Update akumulasi parkir data
        $akumulasiParkir = AkumulasiParkir::latest()->first();
        if ($akumulasiParkir) {
            $akumulasiParkir->total_kendaraan += 1;
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
