<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirKeluar;
use Livewire\WithPagination;
use Carbon\Carbon;

class ParkirKeluarLivewire extends Component
{
    public $no_polisi;
    public $id_kartu;
    public $jam_keluar;
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap'; // Optional: Use Bootstrap styling for pagination

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $trimmedSearch = trim($this->search);

        $parkirKeluarQuery = ParkirKeluar::query()->whereDate('created_at', Carbon::today());

        $parkirKeluarQuery->when($trimmedSearch !== '', function ($query) use ($trimmedSearch) {
            $query->where(function ($query) use ($trimmedSearch) {
                $query->where('no_polisi', 'like', '%' . $trimmedSearch . '%')
                      ->orWhere('id_kartu', 'like', '%' . $trimmedSearch . '%');
            });
        });

        $parkirKeluarResult = $parkirKeluarQuery->paginate(10);

        return view('livewire.parkir-keluar-livewire', ['parkirKeluarArray' => $parkirKeluarResult]);
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

