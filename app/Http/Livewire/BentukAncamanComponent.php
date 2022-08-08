<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BentukAncamanComponent extends Component
{
    public function getBentuk(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('DISTINCT bentukancaman, akibat')
        ->get();
        // dd($jumlah);
        return $jumlah;
    }
    public function render()
    {
        $bentuks = $this->getBentuk();
        return view('livewire.bentuk-ancaman-component',compact('bentuks'));
    }
}
