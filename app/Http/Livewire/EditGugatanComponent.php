<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditGugatanComponent extends Component
{
    use WithFileUploads;
    public $idGugatan;
    public $provinsi = '. . .', $chooseprovinsi, $isProvinsi;
    public $tahun, $statuseksekusi, $namapenggugat, $namatergugat, $nomorperkara, $wilayah, $jeniskasus, $sektor, $nilaikerugian, $dakwaan;
    public $gantirugi, $pemulihan, $lainya;
    public $pngantirugi, $pnpemulihan, $pnlainya, $pnfile, $upnfile;
    public $ptgantirugi, $ptpemulihan, $ptlainya, $ptfile, $uptfile;
    public $magantirugi, $mapemulihan, $malainya, $mafile, $umafile;
    public $pkmagantirugi, $pkmapemulihan, $pkmalainya, $pkmafile, $upkmafile;
    public $kaidahhukum, $proses;

    public function mount($id){
        $this->idGugatan = $id;
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
        $this->upnfile = $data->pnfile;
        $this->ptgantirugi = $data->ptgantirugi;
        $this->ptpemulihan = $data->ptlainya;
        $this->ptlainya = $data->ptlainya;
        $this->uptfile = $data->ptfile;
        $this->magantirugi = $data->magantirugi;
        $this->mapemulihan = $data->mapemulihan;
        $this->malainya = $data->malainya;
        $this->umafile = $data->mafile;
        $this->pkmagantirugi = $data->pkmagantirugi;
        $this->pkmapemulihan = $data->pkmapemulihan;
        $this->pkmalainya = $data->pkmalainya;
        $this->upkmafile = $data->pkmafile;
        $this->kaidahhukum = $data->kaidahhukum;
        $this->proses = $data->proses;
        // dd($data);
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
        if($this->pnfile){
            $file = $this->pnfile->store('public/files/lampiran');
            $foto = $this->pnfile->hashName();
            return $foto;
        }else{
            return $this->upnfile;
        }

    }
    public function uploadPT(){
        if($this->ptfile){
            $file = $this->ptfile->store('public/files/lampiran');
            $foto = $this->ptfile->hashName();
            return $foto;
        }else{
            return $this->uptfile;
        }
    }

    public function uploadMa(){
        if($this->mafile){
            $file = $this->mafile->store('public/files/lampiran');
            $foto = $this->mafile->hashName();
            return $foto;
        }else{
            return $this->umafile;
        }
    }

    public function uploadPKMa(){
        if($this->pkmafile){
            $file = $this->pkmafile->store('public/files/lampiran');
            $foto = $this->pkmafile->hashName();
            return $foto;
        }else{
            return $this->upkmafile;
        }
    }

    public function render(){
        $provincies= $this->getprovinsi();
        return view('livewire.edit-gugatan-component', compact('provincies'));
    }

    public function storeDatabase(){
        // dd($this->namapenggugat);

        if($this->manualValidation()){
            DB::table('dbkasusperdata')
            ->where('id', $this->idGugatan)
            ->update([
                'tahun' => $this->tahun,
                'statuseksekusi' => $this->statuseksekusi,
                'namapenggugat' => $this->namapenggugat,
                'namatergugat' => $this->namatergugat,
                'nomorperkara' => $this->nomorperkara,
                'wilayah' => $this->provinsi,
                'jeniskasus' => $this->jeniskasus,
                'sektor' => $this->sektor,
                'nilaikerugian' => $this->nilaikerugian,
                'dakwaan' => $this->dakwaan,
                'gantirugi' => $this->gantirugi,
                'pemulihan' => $this->pemulihan,
                'lainnya' => $this->lainya,
                'pngantirugi' => $this->pngantirugi,
                'pnpemulihan' => $this->pnpemulihan,
                'pnlainya' => $this->pnlainya,
                'pnfile'  => $this->uploadPN(),
                'ptgantirugi' => $this->ptgantirugi,
                'ptpemulihan' => $this->ptpemulihan,
                'ptlainya' => $this->ptlainya,
                'ptfile' => $this->uploadPT(),
                'magantirugi' => $this->magantirugi,
                'mapemulihan' => $this->mapemulihan,
                'malainya' => $this->malainya,
                'mafile' =>  $this->uploadMa(),
                'pkmagantirugi' => $this->pkmagantirugi,
                'pkmapemulihan' => $this->pkmapemulihan,
                'pkmalainya' => $this->pkmalainya,
                'pkmafile' => $this->uploadPKMa(),
                'kaidahhukum' => $this->kaidahhukum,
                'proses' => $this->proses,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);
            //passing to toast
            $message = 'Successfully updating gudata perdata';
            $type = 'success'; //error, success
            $this->emit('toast',$message, $type);
        }
    }

    public function manualValidation(){
        if($this->tahun == ''){
            $message = 'Tahun is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->provinsi === '. . .') {
            $message = 'Provinsi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->namapenggugat == '') {
            $message = 'Nama Penggugat is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->namatergugat == '') {
            $message = 'Nama Tergugat is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->nomorperkara == '') {
            $message = 'Nomor Perkara is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->jeniskasus == '') {
            $message = 'Jenis Kasus is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->sektor == '') {
            $message = 'Sektor is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->dakwaan == '') {
            $message = 'Dakwaan is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->nilaikerugian == '') {
            $message = 'Nilai Kerugian is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->gantirugi == '') {
            $message = 'Tuntutan Ganti Rugi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->pemulihan == '') {
            $message = 'Tuntutan Ganti Rugi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}
