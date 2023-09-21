<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddSDAComponent extends Component
{
    use WithFileUploads;
    public $provinsi = '. . .', $chooseprovinsi, $isProvinsi;
    public $tahun, $namaterdakwa, $statusterdakwa, $nomorperkara, $wilayah, $jeniskasus, $sektor, $nilaikerugian, $dakwaan;
    public $tuntutanpenjara, $tuntutandenda, $tuntutangantirugi, $tuntutanpemulihan, $tuntutansitaaset;
    public $pnpenjara, $pndenda, $pngantirugi, $pnpemulihan, $pnsitaaset, $pnfile;
    public $ptpenjara, $ptdenda, $ptgantirugi, $ptpemulihan, $ptsitaaset, $ptfile;
    public $mapenjara, $madenda, $magantirugi, $mapemulihan, $masitaaset, $mafile, $kaidahhukum;

    public function toogleProvinsi(){
        // $this->provincies = $this->getprovinsi();
        $this->isProvinsi =! $this->isProvinsi;
    }

    public function getprovinsi(){

        try {
            $req = Http::get('http://129.150.48.143:8080/geoserver/simontini/wfs',
            [
                'service' => 'wfs',
                'version' => '1.1.1',
                'request' => 'GetFeature',
                'typename' => 'simontini:Kecamatan_IDN',
                'propertyName' => 'provinsi',
                'cql_filter' => "provinsi LIKE '%". strtoupper($this->chooseprovinsi) ."%'",
                'outputFormat' => 'application/json',
            ]);
            $response = json_decode($req, true);
            // $arrUnique = array_unique($response['features'][0]['properties']['provinsi']);

            $res = array();
            foreach ($response['features'] as $each) {
                if (isset($res[$each['properties']['provinsi']]))
                    array_push($res[$each['properties']['provinsi']], $each['properties']['provinsi']);
                else
                    $res[$each['properties']['provinsi']] = array($each['properties']['provinsi']);
                }
            return array_slice($res, 0, 10);
        } catch (\Throwable $th) {
            return [];
        }



    }

    public function selectProvinsi($value){
        // dd($value);
        $this->provinsi = $value;
        $this->isProvinsi = false;
        // $this->desa = '. . . ';

    }

    public function uploadPN(){
        if($this->pnfile){
            $file = $this->pnfile->store('public/files/lampiran');
            $foto = $this->pnfile->hashName();


            return $foto;
        }else{
            return null;
        }

    }
    public function uploadPT(){
        if($this->ptfile){
            $file = $this->ptfile->store('public/files/lampiran');
            $foto = $this->ptfile->hashName();


            return $foto;
        }else{
            return null;
        }

    }

    public function uploadMa(){
        if($this->mafile){
            $file = $this->mafile->store('public/files/lampiran');
            $foto = $this->mafile->hashName();


            return $foto;
        }else{
            return null;
        }

    }

    public function storeDatabase(){
        if($this->manualValidation()){
            DB::table('dbkasussda')->insert([
                'tahun' => $this->tahun,
                'namaterdakwa' => $this->namaterdakwa,
                'statusterdakwa' => $this->statusterdakwa,
                'nomorperkara' => $this->nomorperkara,
                'wilayah' => $this->provinsi,
                'jeniskasus' => $this->jeniskasus,
                'sektor' => $this->sektor,
                'nilaikerugian' => $this->nilaikerugian,
                'dakwaan' => $this->dakwaan,
                'tuntutanpenjara' => $this->tuntutanpenjara,
                'tuntutandenda' => $this->tuntutandenda,
                'tuntutangantirugi' => $this->tuntutangantirugi,
                'tuntutanpemulihan' => $this->tuntutanpemulihan,
                'tuntutansitaaset' => $this->tuntutansitaaset,
                'pnpenjara' => $this->pnpenjara,
                'pndenda' => $this->pndenda,
                'pngantirugi' => $this->pngantirugi,
                'pnpemulihan' => $this->pnpemulihan,
                'pnsitaaset' => $this->pnsitaaset,
                'pnfile' => $this->uploadPN(),
                'ptpenjara' => $this->ptpenjara,
                'ptdenda' => $this->ptdenda,
                'ptgantirugi' => $this->ptgantirugi,
                'ptpemulihan' => $this->ptpemulihan,
                'ptsitaaset' => $this->ptsitaaset,
                'ptfile' => $this->uploadPT(),
                'mapenjara' => $this->mapenjara,
                'madenda' => $this->madenda,
                'magantirugi' => $this->magantirugi,
                'mapemulihan' => $this->mapemulihan,
                'masitaaset' => $this->masitaaset,
                'mafile' => $this->uploadMa(),
                'kaidahhukum' => $this->kaidahhukum,
                'tglupdate' => Carbon::now('Asia/Jakarta')
            ]);
            redirect()->to('/cms/dbsda');
        }
    }


    public function render(){
        $provincies= $this->getprovinsi();
        return view('livewire.add-s-d-a-component', compact('provincies'));
    }

    public function manualValidation(){
        if($this->tahun == ''){
            $message = 'Tahun is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->namaterdakwa == ''){
            $message = 'Nama Terdakwa is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->statusterdakwa == ''){
            $message = 'Status Terdakwa is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->nomorperkara == ''){
            $message = 'Nomor Perkara is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->provinsi == ''){
            $message = 'Wilayah is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->jeniskasus == ''){
            $message = 'Jenis Kasus is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->sektor == ''){
            $message = 'Sektor is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->nilaikerugian == ''){
            $message = 'Nilai Kerugian is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->dakwaan == ''){
            $message = 'Dakwaan is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}
