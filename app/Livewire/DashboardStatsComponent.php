<?php

namespace App\Livewire;
use App\Models\AkumulasiParkir;

use Livewire\Component;
use App\Models\ParkirMasuk; // Sesuaikan dengan nama model yang sesuai

class DashboardStatsComponent extends Component
{
    public $tempatParkirTersedia;
    public $tempatParkirTerisi;
    public $tempatParkirKosong;
    public $mobilMasuk;
    public $mobilKeluar;

    public function mount()
    {

        $this->tempatParkirTersedia = 100;
        $this->mobilMasuk = 0;
        $this->mobilKeluar = 0;
        $this->tempatParkirTerisi = 0;
        $this->tempatParkirKosong = 0;


        $akumulasiParkir = AkumulasiParkir::latest()->first();


        if ($akumulasiParkir) {
            $this->mobilMasuk = $akumulasiParkir->kendaraan_masuk;
            $this->mobilKeluar = $akumulasiParkir->kendaraan_keluar;
            $this->tempatParkirTerisi = $this->mobilMasuk - $this->mobilKeluar;
            $this->tempatParkirKosong = $this->tempatParkirTersedia - $this->tempatParkirTerisi;
        }
    }

    public function render()
    {
        return view('livewire.dashboard-stats-component');
    }
}
