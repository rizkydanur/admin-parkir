<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParkirMasuk;
use App\Models\AkumulasiParkir;
use Carbon\Carbon;
class ParkirMasukLivewire extends Component
{
    public $no_polisi;
    public $id_kartu;
    public $jam_masuk;
    public $parkirMasuk;
    public $search = '';

    public function render()
    {

        $parkirMasukArray = [];


        $parkirMasukQuery = ParkirMasuk::whereDate('created_at', Carbon::today());

        if ($this->search !== null && $this->search !== '') {
            $parkirMasukQuery->where('no_polisi', 'like', '%' . $this->search . '%');
        }

        $parkirMasukResult = $parkirMasukQuery->get();

        foreach ($parkirMasukResult as $item) {
            $parkirMasukArray[] = [
                'no_polisi' => $item->no_polisi,
                'id_kartu' => $item->id_kartu,
                'jam_masuk' => $item->jam_masuk,
            ];
        }

        return view('livewire.parkir-masuk-livewire', ['parkirMasukArray' => $parkirMasukArray]);



        // $query = ParkirMasuk::query();

        // $today = Carbon::today()->toDateString();
        // $query->whereDate('jam_masuk', $today);


        // if (!empty($this->search)) {
        //     $search = '%' . $this->search . '%';
        //     $query->where(function($q) use ($search) {
        //         $q->where('no_polisi', 'like', $search)
        //         ->orWhere('id_kartu', 'like', $search);
        //     });
        // }

        // $parkirMasuk = $query->get();

        // return view('livewire.parkir-masuk-livewire', [
        //     'parkirMasuk' => $parkirMasuk,
        // ]);

        // $this->parkirMasuk = ParkirMasuk::all();
        // return view('livewire.parkir-masuk-livewire');
    }





    public function store()
    {
        $this->validate([
            'no_polisi' => 'required|string',
            'id_kartu' => 'required|string',
            'jam_masuk' => 'required|date',
        ]);

        // Simpan data parkir masuk
        $parkirMasuk = ParkirMasuk::create([
            'no_polisi' => $this->no_polisi,
            'id_kartu' => $this->id_kartu,
            'jam_masuk' => $this->jam_masuk,
        ]);

        // Perbarui data akumulasi parkir
        $akumulasiParkir = AkumulasiParkir::find(1); // Ambil data akumulasi parkir dengan id 1
        if ($akumulasiParkir) {
            // Jika data akumulasi parkir ditemukan, tambahkan 1 ke kendaraan_masuk
            $akumulasiParkir->increment('kendaraan_masuk');
            $akumulasiParkir->save();
        }

        $this->resetInputFields();
        session()->flash('message', 'Data parkir masuk berhasil ditambahkan.');
    }

}

