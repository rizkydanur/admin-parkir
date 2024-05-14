<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{


    /**
     * Menampilkan halaman parkir masuk.
     *
     * @return \Illuminate\View\View
     */
    public function parkirMasuk()
    {
        return view('user.parkirMasuk');
    }

    /**
     * Menampilkan halaman parkir keluar.
     *
     * @return \Illuminate\View\View
     */
    public function parkirKeluar()
    {
        return view('user.parkirKeluar');
    }
}
