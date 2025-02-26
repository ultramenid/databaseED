<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class KabkotaComponent extends Component
{
    public $start = "2014-01-01", $end = "2022-12-31";
    protected $listeners = ['filter' => 'setYear'];

    public function setYear($start, $end){
        $this->start = $start;
        $this->end = $end;
        $this->dispatchBrowserEvent('updateChart');

    }

    public function getKabkota(){
        $res =  DB::table('eddatabase')
        ->selectRaw('kabkota, count(kasus) as jumlahkasus')
        ->groupBy('kabkota')
        ->get();

        $tahun = 0;
        foreach($res as $item){
            $data['kabkota'][] = $item->kabkota;
            $data['jumlahkasus'][] = $item->jumlahkasus;
        }
        // dd($data);
        return json_encode($data);
    }
    public function render()
    {
        $kabkota = $this->getKabkota();
        return view('livewire.kabkota-component', compact('kabkota'));
    }
}
