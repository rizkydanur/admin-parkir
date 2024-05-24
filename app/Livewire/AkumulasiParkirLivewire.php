<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\AkumulasiParkir;

class AkumulasiParkirLivewire extends Component
{
    public $kendaraan_masuk;
    public $kendaraan_keluar;
    public $selected_id;
    public $updateMode = false;

    public function render()
    {
        $data = AkumulasiParkir::all();
        return view('livewire.akumulasi-parkir', compact('data'));
    }

    private function resetInput()
    {
        $this->kendaraan_masuk = null;
        $this->kendaraan_keluar = null;
        $this->selected_id = null;
    }

    public function store()
    {
        $this->validate([
            'kendaraan_masuk' => 'required|integer',
            'kendaraan_keluar' => 'required|integer',
        ]);

        AkumulasiParkir::create([
            'kendaraan_masuk' => $this->kendaraan_masuk,
            'kendaraan_keluar' => $this->kendaraan_keluar,
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = AkumulasiParkir::findOrFail($id);

        $this->selected_id = $id;
        $this->kendaraan_masuk = $record->kendaraan_masuk;
        $this->kendaraan_keluar = $record->kendaraan_keluar;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'kendaraan_masuk' => 'required|integer',
            'kendaraan_keluar' => 'required|integer',
        ]);

        if ($this->selected_id) {
            $record = AkumulasiParkir::find($this->selected_id);
            $record->update([
                'kendaraan_masuk' => $this->kendaraan_masuk,
                'kendaraan_keluar' => $this->kendaraan_keluar,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = AkumulasiParkir::where('id', $id);
            $record->delete();
        }
    }
}
