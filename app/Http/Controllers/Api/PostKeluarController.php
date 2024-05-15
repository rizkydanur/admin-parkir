<?php

namespace App\Http\Controllers\Api;

use App\Models\ParkirKeluar;

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
       //get all posts
       $parkirmasuk = ParkirKeluar::latest()->paginate(5);

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
        //define validation rules
        $validator = Validator::make($request->all(), [
            'no_polisi'     => 'required',
            'id_kartu'     => 'required',
            'jam_keluar'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }



        //create post
        $parkirmasuk = ParkirKeluar::create([
            'no_polisi'     => $request->no_polisi,
            'id_kartu'     => $request->id_kartu,
            'jam_keluar'   => $request->jam_keluar,
        ]);

        //return response
        return new ParkirResource(true, 'Data Post Berhasil Ditambahkan!', $parkirmasuk);
    }
}
