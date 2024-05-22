<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\ParkirMasuk;
class ParkingController extends Controller
{

    public function getParkingDataBulan()
    {
        $parkirMasuks = DB::table('parkir_masuks')
            ->select(DB::raw('MONTH(jam_masuk) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(jam_masuk)'))
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $parkirKeluars = DB::table('parkir_keluars')
            ->select(DB::raw('MONTH(jam_keluar) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(jam_keluar)'))
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $masukData = array_fill(0, 12, 0);
        $keluarData = array_fill(0, 12, 0);

        foreach ($parkirMasuks as $month => $count) {
            $masukData[$month - 1] = $count;
        }

        foreach ($parkirKeluars as $month => $count) {
            $keluarData[$month - 1] = $count;
        }

        return response()->json([
            'masuk' => $masukData,
            'keluar' => $keluarData
        ]);
    }

    public function getParkingDataHari()
    {
        $today = now()->toDateString(); // Ambil tanggal hari ini

        $parkirMasuks = DB::table('parkir_masuks')
            ->select(DB::raw('DATE(jam_masuk) as date'), DB::raw('COUNT(*) as count'))
            ->whereDate('jam_masuk', $today)
            ->groupBy(DB::raw('DATE(jam_masuk)'))
            ->get()
            ->pluck('count', 'date')
            ->toArray();

        $parkirKeluars = DB::table('parkir_keluars')
            ->select(DB::raw('DATE(jam_keluar) as date'), DB::raw('COUNT(*) as count'))
            ->whereDate('jam_keluar', $today)
            ->groupBy(DB::raw('DATE(jam_keluar)'))
            ->get()
            ->pluck('count', 'date')
            ->toArray();

        // Inisialisasi array untuk setiap hari dalam seminggu
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $masukData = array_fill_keys($daysOfWeek, 0);
        $keluarData = array_fill_keys($daysOfWeek, 0);

        // Mengisi data yang tersedia
        foreach ($parkirMasuks as $date => $count) {
            $dayName = date('l', strtotime($date)); // Ambil nama hari dari tanggal
            $masukData[$dayName] = $count;
        }

        foreach ($parkirKeluars as $date => $count) {
            $dayName = date('l', strtotime($date)); // Ambil nama hari dari tanggal
            $keluarData[$dayName] = $count;
        }

        return response()->json([
            'masuk' => $masukData,
            'keluar' => $keluarData
        ]);
    }



    public function getParkingDataTahun()
    {
        $parkirMasuks = DB::table('parkir_masuks')
            ->select(DB::raw('YEAR(jam_masuk) as year'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('YEAR(jam_masuk)'))
            ->get()
            ->pluck('count', 'year')
            ->toArray();

        $parkirKeluars = DB::table('parkir_keluars')
            ->select(DB::raw('YEAR(jam_keluar) as year'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('YEAR(jam_keluar)'))
            ->get()
            ->pluck('count', 'year')
            ->toArray();

        $years = array_unique(array_merge(array_keys($parkirMasuks), array_keys($parkirKeluars)));
        sort($years);

        $masukData = [];
        $keluarData = [];

        foreach ($years as $year) {
            $masukData[$year] = $parkirMasuks[$year] ?? 0;
            $keluarData[$year] = $parkirKeluars[$year] ?? 0;
        }

        return response()->json([
            'masuk' => $masukData,
            'keluar' => $keluarData
        ]);
    }
}
