<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirMasuk;
use Carbon\Carbon;
use Livewire\WithPagination;

class ParkirMasukLivewire extends Component
{
    use WithPagination;

    public $no_polisi;
    public $id_kartu;
    public $jam_masuk;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public $startDate;
    public $endDate;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function applyFilters()
    {

    }

    public function render()
    {
        $trimmedSearch = trim($this->search);

        $parkirMasukQuery = ParkirMasuk::query()
            ->orderBy('jam_masuk', 'desc');

        if ($this->startDate && $this->endDate) {
            $parkirMasukQuery->whereBetween('jam_masuk', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay()
            ]);
        } else {

            $parkirMasukQuery->whereDate('jam_masuk', Carbon::today());
        }


        $parkirMasukQuery->when($trimmedSearch !== '', function ($query) use ($trimmedSearch) {
            $query->where(function ($query) use ($trimmedSearch) {
                $query->where('no_polisi', 'like', '%' . $trimmedSearch . '%')
                        ->orWhere('id_kartu', 'like', '%' . $trimmedSearch . '%');
            });
        });

        $parkirMasukResult = $parkirMasukQuery->paginate(20);

        return view('livewire.parkir-masuk-livewire', ['parkirMasukArray' => $parkirMasukResult]);
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
