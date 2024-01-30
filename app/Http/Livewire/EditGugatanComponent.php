<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditGugatanComponent extends Component
{
    public $idGugatan;
    public $provinsi = '. . .', $chooseprovinsi, $isProvinsi;
    public $tahun, $statuseksekusi, $namapenggugat, $namatergugat, $nomorperkara, $wilayah, $jeniskasus, $sektor, $nilaikerugian, $dakwaan;
    public $gantirugi, $pemulihan, $lainya;
    public $pngantirugi, $pnpemulihan, $pnlainya, $pnfile;
    public $ptgantirugi, $ptpemulihan, $ptlainya, $ptfile;
    public $magantirugi, $mapemulihan, $malainya, $mafile;
    public $pkmagantirugi, $pkmapemulihan, $pkmalainya, $pkmafile;
    public $kaidahhukum, $proses;

    public function mount($id){
        $this->idGugatan;
        $data = DB::table('dbkasusperdata')->where('id', $id)->first();
        $this->tahun = $data->tahun;
        $this->statuseksekusi = $data->statuseksekusi;
        $this->namapenggugat = $data->namapenggugat;
        $this->namatergugat = $data->namatergugat;
        $this->nomorperkara = $data->nomorperkara;
        $this->provinsi = $data->wilayah;
        $this->jeniskasus = $data->jeniskasus;
        $this->sektor = $data->sektor;
        $this->nilaikerugian = $data->nilaikerugian;
        $this->dakwaan = $data->dakwaan;
        $this->gantirugi = $data->gantirugi;
        $this->pemulihan = $data->pemulihan;
        $this->lainya = $data->lainnya;
        $this->pngantirugi = $data->gantirugi;
        $this->pnpemulihan = $data->pnpemulihan;
        $this->pnlainya = $data->pnlainya;
        $this->pnfile = $data->pnfile;
        $this->ptgantirugi = $data->ptgantirugi;
        $this->ptpemulihan = $data->ptlainya;
        $this->ptlainya = $data->ptlainya;
        $this->ptfile = $data->ptfile;
        $this->magantirugi = $data->magantirugi;
        $this->mapemulihan = $data->mapemulihan;
        $this->malainya = $data->malainya;
        $this->mafile = $data->mafile;
        $this->pkmagantirugi = $data->pkmagantirugi;
        $this->pkmapemulihan = $data->pkmapemulihan;
        $this->pkmalainya = $data->pkmalainya;
        $this->pkmafile = $data->pkmafile;
        $this->kaidahhukum = $data->kaidahhukum;
        $this->proses = $data->proses;
        // dd($data);
    }
    public function render(){
        return view('livewire.edit-gugatan-component');
    }
}
