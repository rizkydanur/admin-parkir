<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ParkirMasuk;
use Carbon\Carbon;
use Illuminate\Support\Str;
use PhpMqtt\Client\Facades\MQTT;

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

    public $startDate;
    public $endDate;

    protected $rules = [
        'no_polisi' => 'required|string',
        'id_kartu' => 'required|string',
        'jam_masuk' => 'required|date_format:Y-m-d H:i:s',
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

    private function tambahKendaraan(){
        MQTT::publish('sensor/masuk', '1');
    }

   

    public function store()
    {
        
        $parkirmasuk = ParkirMasuk::create([
            'id_kartu'     => Str::random(12),
            'no_polisi'     => 'B'.random_int(1000,9999).'XXX',
            'jam_masuk'   => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        if($parkirmasuk){
            $this->tambahKendaraan();
            $this->resetInputFields();
            session()->flash('message', 'Data parkir masuk berhasil ditambahkan.');

        }

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
