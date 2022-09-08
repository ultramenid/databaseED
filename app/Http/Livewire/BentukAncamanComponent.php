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

    public function getBentukTest(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('DISTINCT bentukancaman, akibat')
        ->get();
        // dd($jumlah);
        // return $jumlah;
        foreach($jumlah as $item){
            $setdata = array($item->bentukancaman, $item->akibat, getScore($item->bentukancaman, $item->akibat));
            $data[] = $setdata;
        }
        // dd($data);
        return json_encode($data);
    }
    public function render()
    {
        $bentuks = $this->getBentuk();
        $bentuktest = $this->getBentukTest();
        return view('livewire.bentuk-ancaman-component',compact('bentuks', 'bentuktest'));
    }
}
