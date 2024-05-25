<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ParkirMasuk;
use Carbon\Carbon;

class ParkirMasukLivewireAdmin extends Component
{
    use WithPagination;

    public $no_polisi;
    public $id_kartu;
    public $jam_masuk;
    public $parkirId;
    public $isEditMode = false;
    public $showForm = false;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'no_polisi' => 'required|string',
        'id_kartu' => 'required|string',
        'jam_masuk' => 'required|date_format:Y-m-d H:i:s',
    ];

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

        return view('livewire.parkir-masuk-livewire-admin', ['parkirMasukArray' => $parkirMasukResult]);
    }

    private function resetInputFields()
    {
        $this->no_polisi = '';
        $this->id_kartu = '';
        $this->jam_masuk = '';
        $this->parkirId = null;
        $this->isEditMode = false;
        $this->showForm = false;
    }

    public function store()
    {
        $this->validate();

        ParkirMasuk::create([
            'no_polisi' => $this->no_polisi,
            'id_kartu' => $this->id_kartu,
            'jam_masuk' => $this->jam_masuk,
        ]);

        session()->flash('message', 'Data parkir masuk berhasil ditambahkan.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = ParkirMasuk::findOrFail($id);

        $this->parkirId = $id;
        $this->no_polisi = $record->no_polisi;
        $this->id_kartu = $record->id_kartu;
        $this->jam_masuk = $record->jam_masuk;

        $this->isEditMode = true;
        $this->showForm = true;
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
    }

    public function delete($id)
    {
        ParkirMasuk::find($id)->delete();
        session()->flash('message', 'data berhasil di di hapus.');
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
