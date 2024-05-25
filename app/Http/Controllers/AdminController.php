<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the home view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.user');
    }

    public function kendaraanMasuk()
    {
        return view('admin.akumulasi-parkir');
    }


    public function parkirMasuk()
    {
        return view('admin.parkirMasuk');
    }

    /**
     * Menampilkan halaman parkir keluar.
     *
     * @return \Illuminate\View\View
     */
    public function parkirKeluar()
    {
        return view('admin.parkirKeluar');
    }


}
