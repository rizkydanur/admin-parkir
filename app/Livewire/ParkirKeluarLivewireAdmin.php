<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ParkirKeluar;
use Carbon\Carbon;

class ParkirKeluarLivewireAdmin extends Component
{
    use WithPagination;

    public $no_polisi;
    public $id_kartu;
    public $jam_keluar;
    public $parkirId;
    public $isEditMode = false;
    public $showForm = false;
    public $search = '';

    protected $paginationTheme = 'bootstrap';


    public $startDate;
    public $endDate;

    protected $rules = [
        'no_polisi' => 'required|string',
        'id_kartu' => 'required|string',
        'jam_keluar' => 'required|date_format:Y-m-d H:i:s',
    ];

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


        $parkirKeluarQuery = ParkirKeluar::query()
            ->orderBy('jam_keluar', 'desc');


        if ($this->startDate && $this->endDate) {
            $parkirKeluarQuery->whereBetween('jam_keluar', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay()
            ]);
        } else {

            $parkirKeluarQuery->whereDate('jam_keluar', Carbon::today());
        }


        $parkirKeluarQuery->when($trimmedSearch !== '', function ($query) use ($trimmedSearch) {
            $query->where(function ($query) use ($trimmedSearch) {
                $query->where('no_polisi', 'like', '%' . $trimmedSearch . '%')
                      ->orWhere('id_kartu', 'like', '%' . $trimmedSearch . '%');
            });
        });


        $parkirKeluarResult = $parkirKeluarQuery->paginate(20);

        return view('livewire.parkir-keluar-livewire-admin', ['parkirKeluarArray' => $parkirKeluarResult]);
    }

    private function resetInputFields()
    {
        $this->no_polisi = '';
        $this->id_kartu = '';
        $this->jam_keluar = '';
        $this->parkirId = null;
        $this->isEditMode = false;
        $this->showForm = false;
    }

    public function store()
    {
        $this->validate();

        ParkirKeluar::create([
            'no_polisi' => $this->no_polisi,
            'id_kartu' => $this->id_kartu,
            'jam_keluar' => $this->jam_keluar,
        ]);

        session()->flash('message', 'Data parkir keluar berhasil ditambahkan.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = ParkirKeluar::findOrFail($id);

        $this->parkirId = $id;
        $this->no_polisi = $record->no_polisi;
        $this->id_kartu = $record->id_kartu;
        $this->jam_keluar = $record->jam_keluar;

        $this->isEditMode = true;
        $this->showForm = true;
    }

    public function update()
    {
        $this->validate();

        $record = ParkirKeluar::find($this->parkirId);
        $record->update([
            'no_polisi' => $this->no_polisi,
            'id_kartu' => $this->id_kartu,
            'jam_keluar' => $this->jam_keluar,
        ]);

        session()->flash('message', 'Record updated successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        ParkirKeluar::find($id)->delete();
        session()->flash('message', 'Record deleted successfully.');
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        if (!$this->showForm) {
            $this->resetInputFields();
        }
    }
}
