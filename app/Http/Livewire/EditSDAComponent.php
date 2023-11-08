<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditSDAComponent extends Component
{
    use WithFileUploads;
    public $provinsi = '. . .', $chooseprovinsi, $isProvinsi, $idSDA, $upnfile, $uptfile, $umafile;
    public $tahun, $namaterdakwa, $statusterdakwa, $nomorperkara, $wilayah, $jeniskasus, $sektor, $nilaikerugian, $dakwaan;
    public $tuntutanpenjara, $tuntutandenda, $tuntutangantirugi, $tuntutanpemulihan, $tuntutansitaaset;
    public $pnpenjara, $pndenda, $pngantirugi, $pnpemulihan, $pnsitaaset, $pnfile ;
    public $ptpenjara, $ptdenda, $ptgantirugi, $ptpemulihan, $ptsitaaset, $ptfile;
    public $mapenjara, $madenda, $magantirugi, $mapemulihan, $masitaaset, $mafile, $kaidahhukum;


    public function getSDA($id){
        return DB::table('dbkasussda')->where('id', $id)->first();
    }
    public function mount($id){
        $data = $this->getSDA($id);
        // dd($data);
        $this->idSDA = $id;
        $this->pnfile = $data->pnfile;
        $this->ptfile = $data->ptfile;
        $this->mafile = $data->mafile;
        $this->tahun = $data->tahun;
        $this->namaterdakwa = $data->namaterdakwa;
        $this->statusterdakwa = $data->statusterdakwa;
        $this->nomorperkara = $data->nomorperkara;
        $this->provinsi = $data->wilayah;
        $this->jeniskasus = $data->jeniskasus;
        $this->sektor = $data->sektor;
        $this->nilaikerugian = $data->nilaikerugian;
        $this->dakwaan = $data->dakwaan;
        $this->tuntutanpenjara = $data->tuntutanpenjara;
        $this->tuntutandenda = $data->tuntutandenda;
        $this->tuntutangantirugi = $data->tuntutangantirugi;
        $this->tuntutanpemulihan = $data->tuntutanpemulihan;
        $this->tuntutansitaaset = $data->tuntutansitaaset;
        $this->pnpenjara = $data->pnpenjara;
        $this->pndenda = $data->pndenda;
        $this->pngantirugi = $data->pngantirugi;
        $this->pnpemulihan = $data->pnpemulihan;
        $this->pnsitaaset = $data->pnsitaaset;
        $this->ptpenjara = $data->ptpenjara;
        $this->ptdenda = $data->ptdenda;
        $this->ptgantirugi = $data->ptgantirugi;
        $this->ptpemulihan = $data->ptpemulihan;
        $this->ptsitaaset = $data->ptsitaaset;
        $this->mapenjara = $data->mapenjara;
        $this->madenda = $data->madenda;
        $this->magantirugi = $data->magantirugi;
        $this->mapemulihan = $data->mapemulihan;
        $this->masitaaset = $data->masitaaset;
        $this->kaidahhukum = $data->kaidahhukum;
    }
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
        $file = $this->upnfile->store('public/files/lampiran');
        $foto = $this->upnfile->hashName();

        return $foto;
    }
    public function uploadPT(){
        $file = $this->uptfile->store('public/files/lampiran');
        $foto = $this->upnfile->hashName();

        return $foto;
    }

    public function uploadMa(){
        $file = $this->umafile->store('public/files/lampiran');
        $foto = $this->umafile->hashName();

        return $foto;
    }

    public function checkPNFile(){
        if(!$this->upnfile){
            $namePN = $this->pnfile;
        }else{
            try {
                unlink(public_path('storage/files/lampiran/'.$this->pnfile));
                 $namePN=  $this->uploadPN();
            } catch (\Throwable $th) {
               $namePN=  $this->uploadPN();
            }

        }
        return $namePN;
    }
    public function checkPTFile(){
        if(!$this->uptfile){
            $namePT = $this->ptfile;
        }else{
            try {
                unlink(public_path('storage/files/lampiran/'.$this->ptfile));
                 $namePT=  $this->uploadPT();
            } catch (\Throwable $th) {
               $namePT=  $this->uploadPT();
            }

        }
        return $namePT;
    }
    public function checkMAFile(){
        if(!$this->umafile){
            $nameMA = $this->mafile;
        }else{
            try {
                unlink(public_path('storage/files/lampiran/'.$this->mafile));
                 $nameMA=  $this->uploadMa();
            } catch (\Throwable $th) {
               $nameMA=  $this->uploadMa();
            }

        }
        return $nameMA;
    }

    public function storeDatabase(){
        // dd($this->checkPNFile());
        if($this->manualValidation()){

            DB::table('dbkasussda')
            ->where('id', $this->idSDA)
            ->update([
                'tglupdate' => Carbon::now('Asia/Jakarta'),
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
                'pnfile' => $this->checkPNFile(),
                'ptpenjara' => $this->ptpenjara,
                'ptdenda' => $this->ptdenda,
                'ptgantirugi' => $this->ptgantirugi,
                'ptpemulihan' => $this->ptpemulihan,
                'ptsitaaset' => $this->ptsitaaset,
                'ptfile' => $this->checkPTFile(),
                'mapenjara' => $this->mapenjara,
                'madenda' => $this->madenda,
                'magantirugi' => $this->magantirugi,
                'mapemulihan' => $this->mapemulihan,
                'masitaaset' => $this->masitaaset,
                'mafile' => $this->checkMAFile(),
                'kaidahhukum' => $this->kaidahhukum,
            ]);

            redirect()->to('/cms/dbsda');
        }
    }

    public function render(){
        $provincies = $this->getprovinsi();
        return view('livewire.edit-s-d-a-component', compact('provincies'));
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
