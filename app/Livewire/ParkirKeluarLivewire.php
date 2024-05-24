<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirKeluar;
use Carbon\Carbon;

class ParkirKeluarLivewire extends Component
{
    public $no_polisi;
    public $id_kartu;
    public $jam_keluar;
    public $parkirKeluar;
    public $search = '';

    public function render()
    {
        $parkirKeluarArray = [];


        $parkirKeluarQuery = ParkirKeluar::whereDate('created_at', Carbon::today());

        if ($this->search !== null && $this->search !== '') {
            $parkirKeluarQuery->where('no_polisi', 'like', '%' . $this->search . '%');
        }

        $parkirKeluarResult = $parkirKeluarQuery->get();

        foreach ($parkirKeluarResult as $item) {
            $parkirKeluarArray[] = [
                'no_polisi' => $item->no_polisi,
                'id_kartu' => $item->id_kartu,
                'jam_keluar' => $item->created_at,
            ];
        }
        

        return view('livewire.parkir-keluar-livewire',[
        'parkirKeluarArray'=> $parkirKeluarArray
        ]);
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
            'jam_keluar' => $this->created_at,
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

