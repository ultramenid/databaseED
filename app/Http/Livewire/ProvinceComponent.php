<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProvinceComponent extends Component
{
    public $start = "2014-01-01", $end = "2022-12-31";
    protected $listeners = ['filter' => 'setYear'];

    public function setYear($start, $end){
        $this->start = $start;
        $this->end = $end;
        $this->dispatchBrowserEvent('updateChart');

    }

    public function getProvinsi(){
        $res =  DB::table('eddatabase')
        ->selectRaw('provinsi, count(kasus) as jumlahkasus')
        ->groupBy('provinsi')
        ->get();

        $tahun = 0;
        foreach($res as $item){
            $data['provinsi'][] = $item->provinsi;
            $data['jumlahkasus'][] = $item->jumlahkasus;
        }
        // dd($data);
        return json_encode($data);
    }

    public function render()
    {
        $provinsi = $this->getProvinsi();
        return view('livewire.province-component', compact('provinsi'));
    }
}
