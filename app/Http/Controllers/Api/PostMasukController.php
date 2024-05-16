<?php

namespace App\Http\Controllers\Api;

use App\Models\ParkirMasuk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ParkirResource;

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
            'no_polisi'     => 'required',
            'id_kartu'     => 'required',
            'jam_masuk'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $parkirmasuk = ParkirMasuk::create([
            'no_polisi'     => $request->no_polisi,
            'id_kartu'     => $request->id_kartu,
            'jam_masuk'   => $request->jam_masuk,
        ]);

        //return response
        return new ParkirResource(true, 'Data Post Berhasil Ditambahkan!', $parkirmasuk);
    }
}
