<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MapDatabase extends Component
{
    public function getMarker(){
        return  DB::table('eddatabase')->select('kasus','lat', 'long','akibat','bentukancaman','korban', 'pelaku', 'jumlahkorban', 'konflikdengan', 'namapelaku','sektor')->get();

    }
    public function render()
    {
        $markers = $this->getMarker();
        return view('livewire.map-database', compact('markers'));
    }
}
