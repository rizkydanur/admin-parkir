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
    public $isEditMode = false;

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

        $parkirMasukQuery = ParkirMasuk::query()
            ->whereDate('jam_masuk', Carbon::today())
            ->orderBy('jam_masuk', 'desc');

        $parkirMasukQuery->when($trimmedSearch !== '', function ($query) use ($trimmedSearch) {
            $query->where(function ($query) use ($trimmedSearch) {
                $query->where('no_polisi', 'like', '%' . $trimmedSearch . '%')
                      ->orWhere('id_kartu', 'like', '%' . $trimmedSearch . '%');
            });
        });


        $parkirMasukResult = $parkirMasukQuery->paginate(20);


        return view('livewire.parkir-masuk-livewire', ['parkirMasukArray' => $parkirMasukResult]);
    }






    private function resetInputFields()
    {
        $this->no_polisi = '';
        $this->id_kartu = '';
        $this->jam_masuk = '';
    }


    public function store()
    {
        $this->validate();

        ParkirMasuk::create([
            'no_polisi' => $this->no_polisi,
            'id_kartu' => $this->id_kartu,
            'jam_masuk' => $this->jam_masuk,
        ]);

        session()->flash('message', 'Record added successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = ParkirMasuk::findOrFail($id);

        $this->no_polisi = $record->no_polisi;
        $this->id_kartu = $record->id_kartu;
        $this->jam_masuk = $record->jam_masuk;

        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();

        $record = ParkirMasuk::find($this->parkirId);
        $record->update([
            'no_polisi' => $this->no_polisi,
            'id_kartu' => $this->id_kartu,
            'jam_masuk' => $this->jam_masuk,
        ]);

        session()->flash('message', 'Record updated successfully.');
        $this->resetInputFields();
        $this->isEditMode = false;
    }

    public function delete($id)
    {
        ParkirMasuk::find($id)->delete();
        session()->flash('message', 'data berhasil di di hapus.');
    }


}

