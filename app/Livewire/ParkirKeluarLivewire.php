<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirKeluar;

class ParkirKeluarLivewire extends Component
{
    public $no_polisi;
    public $id_kartu;
    public $jam_keluar;

    public function render()
    {
        $parkir_keluar = ParkirKeluar::all();
        return view('livewire.parkir-keluar', ['parkir_keluar' => $parkir_keluar]);
    }

    public function store()
    {
        $this->validate([
            'no_polisi' => 'required|string',
            'id_kartu' => 'required|string',
            'jam_keluar' => 'required|date',
        ]);

        ParkirKeluar::create([
            'no_polisi' => $this->no_polisi,
            'id_kartu' => $this->id_kartu,
            'jam_keluar' => $this->jam_keluar,
        ]);

        $this->resetInputFields();
        session()->flash('message', 'Data parkir keluar berhasil ditambahkan.');
    }

    private function resetInputFields()
    {
        $this->no_polisi = '';
        $this->id_kartu = '';
        $this->jam_keluar = '';
    }
}

