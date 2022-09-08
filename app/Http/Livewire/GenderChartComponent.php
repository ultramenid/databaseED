<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GenderChartComponent extends Component
{
    public function getGenders(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('SUM(jeniskelamin="LAKI-LAKI") as laki, SUM(jeniskelamin ="PEREMPUAN") as perempuan, SUM(jeniskelamin = "LAKI-LAKI & PEREMPUAN") as lakiperempuan')
        ->first();

            $data['laki'][] = $jumlah->laki;
            $data['perempuan'][] = $jumlah->perempuan;
            $data['lakiperempuan'][] = $jumlah->lakiperempuan;


        return json_encode($data);
    }
    public function render()
    {
        $genders = $this->getGenders();
        return view('livewire.gender-chart-component',compact('genders'));
    }
}
