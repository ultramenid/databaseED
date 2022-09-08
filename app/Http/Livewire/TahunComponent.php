<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TahunComponent extends Component
{
    public $start = "2014-01-01", $end = "2022-12-31";
    protected $listeners = ['filter' => 'setYear'];

    public function setYear($start, $end){
        $this->start = $start;
        $this->end = $end;
        $this->dispatchBrowserEvent('updateChart');

    }

    public function getTahun(){
        $res =  DB::table('eddatabase')
        ->selectRaw('YEAR(tanggalkejadian) as YEAR, count(kasus) as jumlahkasus')
        ->groupBy('YEAR')
        ->get();

        $tahun = 0;
        foreach($res as $item){
            $data['tahun'][] = $item->YEAR;
            $data['jumlahkasus'][] = $item->jumlahkasus;
            $tahun += $item->jumlahkasus;
            $data['tambahkasus'][] = $tahun;


        }
        // dd($data);
        return json_encode($data);
    }

    public function render()
    {
        $tahuns = $this->getTahun();
        return view('livewire.tahun-component', compact('tahuns'));
    }
}
