<?php

namespace App\Livewire;
use PhpMqtt\Client\Facades\MQTT;
use Livewire\Component;

use App\Models\AkumulasiParkir;

class AkumulasiParkirLivewire extends Component
{
    public $total_kendaraan_parkir;
    public $selected_id;
    public $updateMode = false;

    public $selectedItemId;

    public function render()
    {

        $data = AkumulasiParkir::all();
        return view('livewire.akumulasi-parkir', compact('data'));
    }

    private function resetInput()
    {
        MQTT::publish('reset/totalslots', '1');
        $this->total_kendaraan_parkir = 0;

    }

    private function updateMQTT($total){
        MQTT::publish('update/totalslots', $total);
    }

    public function edit($id)
    {
        $record = AkumulasiParkir::findOrFail($id);

        $this->selected_id = $id;
        $this->total_kendaraan_parkir = $record->total_kendaraan_parkir;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'total_kendaraan_parkir' => 'required|integer',
        ]);
        if ($this->selected_id) {
            $record = AkumulasiParkir::find($this->selected_id)->first();
            $record->total_kendaraan_parkir = $this->total_kendaraan_parkir;
            $record->total_parkir_tersedia = $record->total_parkir_tersedia - $this->total_kendaraan_parkir;
            $record->save();
            if($record){
                $this->updateMQTT($this->total_kendaraan_parkir);
            }
            $this->updateMode = false;
        }
    }


    public function confirmReset($id)
    {
        $this->selectedItemId = $id;
    }

    public function resetRecord($id)
    {
        $record = AkumulasiParkir::find($id);
        MQTT::publish('reset/totalslots', '1');
        if ($record) {
            $record->total_kendaraan_parkir = 0;
            $record->total_parkir_tersedia = 144;
            $record->save();

        $this->resetInput();

            session()->flash('message', 'Data has been reset successfully.');
        } else {
            session()->flash('error', 'Record not found.');
        }
    }
}
