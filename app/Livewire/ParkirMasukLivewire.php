<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirMasuk;
use App\Models\AkumulasiParkir;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ParkirMasukLivewire extends Component
{
    public $no_polisi;
    public $id_kartu;
    public $jam_masuk;
    public $parkirMasuk;
    public $search ='';

    public function render()
    {
        $parkirMasukArray = [];

        // Start building the query
        $parkirMasukQuery = ParkirMasuk::query()->whereDate('created_at', Carbon::today());

        // Apply search condition if $search is not empty
        if ($this->search !== '') {
            $parkirMasukQuery->where(function (Builder $query) {
                $query->where('no_polisi', 'like', '%' . $this->search . '%')
                    ->orWhere('id_kartu', 'like', '%' . $this->search . '%');
            });
        }

        // Execute the query
        $parkirMasukResult = $parkirMasukQuery->get();

        // Format the results
        foreach ($parkirMasukResult as $item) {
            $parkirMasukArray[] = [
                'no_polisi' => $item->no_polisi,
                'id_kartu' => $item->id_kartu,
                'jam_masuk' => $item->jam_masuk,
            ];
        }

        return view('livewire.parkir-masuk-livewire', ['parkirMasukArray' => $parkirMasukArray]);
    }





    public function store()
    {
        $this->validate([
            'no_polisi' => 'required|string',
            'id_kartu' => 'required|string',
            'jam_keluar' => 'required|date',
        ]);

        ParkirMasuk::create([
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
        $this->jam_masuk = '';
    }

}

