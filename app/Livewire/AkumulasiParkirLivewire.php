<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\AkumulasiParkir;

class AkumulasiParkirLivewire extends Component
{
    public $total_kendaraan;
    public $selected_id;
    public $updateMode = false;

    public function render()
    {
        $data = AkumulasiParkir::all();
        return view('livewire.akumulasi-parkir', compact('data'));
    }

    private function resetInput()
    {
        $this->total_kendaraan = null;

    }



    public function edit($id)
    {
        $record = AkumulasiParkir::findOrFail($id);

        $this->selected_id = $id;
        $this->total_kendaraan = $record->total_kendaraan;


        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'total_kendaraan' => 'required|integer',
        ]);

        if ($this->selected_id) {
            $record = AkumulasiParkir::find($this->selected_id);
            $record->update([
                'total_kendaraan' => $this->total_kendaraan,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function resetRecord($id)
    {
        $record = AkumulasiParkir::find($id);

        if ($record) {
            $record->total_kendaraan = 0;
            $record->save();

            session()->flash('message', 'Data has been reset successfully.');
        } else {
            session()->flash('error', 'Record not found.');
        }
    }
}
