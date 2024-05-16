<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirMasuk;
use App\Http\Resources\ParkirResource;
class ParkirMasukLivewire extends Component
{
    public $no_polisi;
    public $id_kartu;
    public $jam_masuk;
    public $parkirMasuk;

    public function render()
    {
        $this->parkirMasuk = ParkirMasuk::all();
        return view('livewire.parkir-masuk-livewire');
    }


    public function index()
    {
        $parkirMasuk = ParkirMasuk::latest()->paginate(5);
        // return view('livewire.parkir-masuk-livewire');
        return new ParkirResource(true, 'List Data Posts', $parkirMasuk);
    }

    public function store()
    {
        $this->validate([
            'no_polisi' => 'required|string',
            'id_kartu' => 'required|string',
            'jam_masuk' => 'required|date',
        ]);

        ParkirMasuk::create([
            'no_polisi' => $this->no_polisi,
            'id_kartu' => $this->id_kartu,
            'jam_masuk' => $this->jam_masuk,
        ]);

        $this->resetInputFields();
        session()->flash('message', 'Data parkir masuk berhasil ditambahkan.');
    }

    private function resetInputFields()
    {
        $this->no_polisi = '';
        $this->id_kartu = '';
        $this->jam_masuk = '';
    }
}
