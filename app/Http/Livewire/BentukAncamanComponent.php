<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BentukAncamanComponent extends Component
{
    public function getBentuk(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('SUM(bentukancaman="Kriminalisasi") as kriminalisasi, SUM(bentukancaman ="Ancaman Fisik") as ancamanfisik, SUM(bentukancaman = "Ancaman Psikologis/Non Fisik") as ancamannonfisik')
        ->first();
        // dd($jumlah);
        return $jumlah;
    }
    public function render()
    {
        $bentuks = $this->getBentuk();
        return view('livewire.bentuk-ancaman-component',compact('bentuks'));
    }
}
