<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirMasuk;
use Carbon\Carbon;
class ParkirMasukLivewire extends Component
{
    public $no_polisi;
    public $id_kartu;
    public $jam_masuk;
    public $parkirMasuk;
    public $search = '';

    public function render()
    {

        $parkirMasukArray = [];


        $parkirMasukQuery = ParkirMasuk::whereDate('created_at', Carbon::today());

        if ($this->search !== null && $this->search !== '') {
            $parkirMasukQuery->where('no_polisi', 'like', '%' . $this->search . '%');
        }

        $parkirMasukResult = $parkirMasukQuery->get();

        foreach ($parkirMasukResult as $item) {
            $parkirMasukArray[] = [
                'no_polisi' => $item->no_polisi,
                'id_kartu' => $item->id_kartu,
                'jam_masuk' => $item->created_at,
            ];
        }
        
        return view('livewire.parkir-masuk-livewire', [
            'parkirMasukArray' => $parkirMasukArray
        ]);

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

