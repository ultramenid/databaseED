<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SektorComponent extends Component
{
    public function getSektor(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('SUM(sektor="Lingkungan Hidup") as lingkunganhidup, SUM(sektor ="Hutan") as hutan, SUM(sektor = "Kebun") as kebun,SUM(sektor = "Tambang") as tambang, SUM(sektor = "Energi") as energi,   SUM(sektor = "Tanah/Tanah Adat") as tanahadat, SUM(sektor = "Perairan dan Kelautan") as perairan')
        ->first();
        // dd($jumlah);
        return $jumlah;
    }
    public function render()
    {
        $sektors = $this->getSektor();
        return view('livewire.sektor-component', compact('sektors'));
    }
}
