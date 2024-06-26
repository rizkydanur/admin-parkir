<?php

namespace App\Livewire;
use App\Models\AkumulasiParkir;

use Livewire\Component;
use App\Models\ParkirMasuk; // Sesuaikan dengan nama model yang sesuai
use App\Models\ParkirKeluar;
use Carbon\Carbon;
class DashboardStatsComponent extends Component
{
    public $tempatParkirTersedia;
    public $tempatParkirTerisi;
    public $tempatParkirKosong;
    public $mobilMasuk;
    public $mobilKeluar;

    public function mount()
    {
        $this->tempatParkirTersedia = 144;
        $this->mobilMasuk = 0;
        $this->mobilKeluar = 0;
        $this->tempatParkirTerisi = 0;
        $this->tempatParkirKosong = 0;

        // Mendapatkan jumlah total kendaraan masuk pada hari ini
        $this->mobilMasuk = ParkirMasuk::whereDate('created_at', Carbon::today())->count();

        // Mendapatkan jumlah total kendaraan keluar pada hari ini
        $this->mobilKeluar = ParkirKeluar::whereDate('created_at', Carbon::today())->count();

        // Menghitung tempat parkir yang terisi dan kosong
        $this->tempatParkirTerisi = $this->mobilMasuk - $this->mobilKeluar;
        $this->tempatParkirKosong = $this->tempatParkirTersedia - $this->tempatParkirTerisi;
    }

    public function render()
    {
        $this->tempatParkirTersedia = 528;
        $this->mobilMasuk = 0;
        $this->mobilKeluar = 0;
        $this->tempatParkirTerisi = 0;
        $this->tempatParkirKosong = 0;

        // Mendapatkan jumlah total kendaraan masuk pada hari ini
        $this->mobilMasuk = ParkirMasuk::whereDate('created_at', Carbon::today())->count();

        // Mendapatkan jumlah total kendaraan keluar pada hari ini
        $this->mobilKeluar = ParkirKeluar::whereDate('created_at', Carbon::today())->count();

        // Menghitung tempat parkir yang terisi dan kosong
        $this->tempatParkirTerisi = $this->mobilMasuk - $this->mobilKeluar;
        $this->tempatParkirKosong = $this->tempatParkirTersedia - $this->tempatParkirTerisi;
        
        return view('livewire.dashboard-stats-component');
    }
}
