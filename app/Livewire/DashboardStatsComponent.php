<?php

namespace App\Http\Livewire;

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
        // Ambil data dari database dan assign ke property
        $this->tempatParkirTersedia = 100; // Contoh data statik, gantilah dengan data yang sesuai dari database
        $this->tempatParkirTerisi = 50; // Contoh data statik, gantilah dengan data yang sesuai dari database
        $this->tempatParkirKosong = 25; // Contoh data statik, gantilah dengan data yang sesuai dari database
        $this->mobilMasuk = 75; // Contoh data statik, gantilah dengan data yang sesuai dari database
        $this->mobilKeluar = 75; // Contoh data statik, gantilah dengan data yang sesuai dari database
    }

    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
