<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TahunComponent extends Component
{
    public function getTahun(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('YEAR(tanggalkejadian) as YEAR, count(kasus) as jumlahkasus')
        ->groupBy('YEAR')
        ->get();
        foreach($jumlah as $item){
            $data['tahun'][] = $item->YEAR;
            $data['jumlahkasus'][] = $item->jumlahkasus;
        }
        // dd($jumlah);
        return json_encode($data);
    }

    public function render()
    {
        $tahuns = $this->getTahun();
        return view('livewire.tahun-component', compact('tahuns'));
    }
}
