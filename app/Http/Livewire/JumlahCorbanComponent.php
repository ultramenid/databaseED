<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JumlahCorbanComponent extends Component
{
    public function getJumlahKorban(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('YEAR(tanggalkejadian) as YEAR, sum(jumlahkorban) as korbans')
        ->groupBy('YEAR')
        ->get();
        foreach($jumlah as $item){
            $data['tanggal'][] = $item->YEAR;
            $data['jumlahkorban'][] = $item->korbans;
        }
        // dd($bExecution);
        return json_encode($data);
    }

    public function render()
    {
        $korbans = $this->getJumlahKorban();
        return view('livewire.jumlah-corban-component',compact('korbans'));
    }
}
