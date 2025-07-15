<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BentukAncamanComponent extends Component
{
    public function getBentukTest()
    {
        $jumlah =  DB::table('eddatabase')
            ->selectRaw('SUM(tindakan="Perusakan Properti") as perusakanProperti, SUM(tindakan ="Pembunuhan") as pembunuhan, SUM(tindakan = "Intimidasi") as intimidasi, SUM(tindakan = "Kekerasan Fisik") as kekerasanFisik, SUM(tindakan = "Deportasi") as deportasi, SUM(tindakan = "Penyalahgunaan Proses Hukum") as penyalahGunaanHukum')
            ->first();

        $data['perusakanProperti'][] = $jumlah->perusakanProperti;
        $data['pembunuhan'][] = $jumlah->pembunuhan;
        $data['intimidasi'][] = $jumlah->intimidasi;
        $data['kekerasanFisik'][] = $jumlah->kekerasanFisik;
        $data['deportasi'][] = $jumlah->deportasi;
        $data['penyalahGunaanHukum'][] = $jumlah->penyalahGunaanHukum;


        return json_encode($data);
    }


    public function render()
    {
        $genders = $this->getBentukTest();
        return view('livewire.bentuk-ancaman-component', compact('genders'));
    }
}
