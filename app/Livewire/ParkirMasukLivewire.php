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

    use WithPagination;

    public $search = '';

    public function render()
    {

        $parkirMasukArray = [];


        $parkirMasukQuery = ParkirMasuk::query()->whereDate('jam_masuk', Carbon::today())->orderBy('created_at', 'desc');

        $parkirMasukQuery->when($trimmedSearch !== '', function ($query) use ($trimmedSearch) {
            $query->where(function ($query) use ($trimmedSearch) {
                $query->where('no_polisi', 'like', '%' . $trimmedSearch . '%')
                      ->orWhere('id_kartu', 'like', '%' . $trimmedSearch . '%');
            });
        });


        $parkirMasukResult = $parkirMasukQuery->paginate(5);


        return view('livewire.parkir-masuk-livewire', ['parkirMasukArray' => $parkirMasukResult]);
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

