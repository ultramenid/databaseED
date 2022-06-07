<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MapDatabase extends Component
{
    public function getMarker(){
        $bExecution =  DB::table('eddatabase')->select('kasus','lat', 'long','tanggalkejadian','bentukancaman','korban', 'pelaku')->get();
        foreach($bExecution as $item){
            $data['kasus'][] = $item->kasus;
            $data['lat'][] = $item->lat;
            $data['long'][] = $item->long;
            $data['tanggalkejadian'][] = $item->tanggalkejadian;
            $data['bentukancaman'][] = $item->bentukancaman;
            $data['korban'][] = $item->korban;
            $data['pelaku'][] = $item->pelaku;
        }
        // dd($data);
        return json_encode($data);
    }
    public function render()
    {
        return view('livewire.map-database');
    }
}
