<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MapChoropletComponent extends Component
{
    public function getKasus(){
        $jumlah=  DB::table('eddatabase')
        ->selectRaw('provinsi, count(kasus) as kasus')
        ->groupBy('provinsi')
        ->get();

        $data = array();
        foreach($jumlah as $item){
            $data[$item->provinsi] = $item->kasus;
        }
        // dd($bExecution);
        return json_encode($data);
    }
    public function render()
    {
        $data = $this->getKasus();
        return view('livewire.map-choroplet-component',compact('data'));
    }
}
