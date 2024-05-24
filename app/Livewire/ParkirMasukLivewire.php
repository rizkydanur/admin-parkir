<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirMasuk;
use App\Models\AkumulasiParkir;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ParkirMasukLivewire extends Component
{
    public $no_polisi;
    public $id_kartu;
    public $jam_masuk;
    public $parkirMasuk;

    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $trimmedSearch = trim($this->search);

        $parkirMasukQuery = ParkirMasuk::query()->whereDate('created_at', Carbon::today());

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

