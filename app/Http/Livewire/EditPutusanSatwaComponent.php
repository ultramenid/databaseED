<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class EditPutusanSatwaComponent extends Component
{
    public $provinsi = '. . .', $kabkota = '. . .', $isProvinsi, $isKabkota, $idPutusanSatwa;
    public $chooseprovinsi = '', $choosekabkota = '';
    public $tahun, $terdakwa, $object, $dakwaan, $ancamanuupenjara, $ancamanuudenda, $tuntutanpenjara, $tuntutandenda, $putusanpenjara, $putusandenda, $noputusan;

    public function mount($id){
        $this->idPutusanSatwa = $id;
        $data = DB::table('dbputusansatwa')->where('id', $id)->first();
        // dd($data);
        $this->tahun = $data->tahun;
        $this->terdakwa = $data->terdakwa;
        $this->provinsi = $data->provinsi;
        $this->kabkota = $data->kabkota;
        $this->object = $data->object;
        $this->dakwaan = $data->dakwaan;
        $this->ancamanuupenjara = $data->ancamanuupenjara;
        $this->ancamanuudenda = $data->ancamanuudenda;
        $this->tuntutanpenjara = $data->tuntutanpenjara;
        $this->tuntutandenda = $data->tuntutandenda;
        $this->putusanpenjara = $data->putusanpenjara;
        $this->putusandenda = $data->putusandenda;
        $this->noputusan = $data->noputusan;

    }

    public function selectProvinsi($value){
        // dd($value);
        $this->provinsi = $value;
        $this->isProvinsi = false;
        $this->kabkota = '. . . ';
        // $this->desa = '. . . ';

    }
    public function selectKabkota($value){
        $this->kabkota = $value;
        $this->isKabkota = false;
        // $this->desa = '. . . ';
    }
    public function getprovinsi(){
        // $sc = '%' . $this->chooseprovinsi . '%';

        // return  DB::table('provinces')
        // ->select('id', 'name')
        // ->where('name', 'like',  $sc)
        // ->limit(15)
        // ->get();
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
    public function getKabkota(){
        // $sc = '%' . $this->choosekabkota . '%';

        // return  DB::table('regencies')
        // ->select('id', 'name')
        // ->where('province_id', $this->idProvinsi)
        // ->where('name', 'like',  $sc)
        // ->limit(15)
        // ->get();
        try {
            $req = Http::get('http://129.150.48.143:8080/geoserver/simontini/wfs',
            [
                'service' => 'wfs',
                'version' => '1.1.1',
                'request' => 'GetFeature',
                'typename' => 'simontini:Kecamatan_IDN',
                'propertyName' => 'provinsi,kab_kota',
                'cql_filter' => "provinsi = '". $this->provinsi ."' AND kab_kota LIKE '%". strtoupper($this->choosekabkota) ."%'",
                'outputFormat' => 'application/json',
            ]);
            $response = json_decode($req, true);
            // $arrUnique = array_unique($response['features'][0]['properties']['provinsi']);

            $res = array();
            foreach ($response['features'] as $each) {
                if (isset($res[$each['properties']['kab_kota']]))
                    array_push($res[$each['properties']['kab_kota']], $each['properties']['kab_kota']);
                else
                    $res[$each['properties']['kab_kota']] = array($each['properties']['kab_kota']);
                }
            return array_slice($res, 0, 10);
        } catch (\Throwable $th) {
            return [];
        }


    }

    public function storeDatabase(){
        if($this->manualValidation()){
            DB::table('dbputusansatwa')
            ->where('id', $this->idPutusanSatwa)
            ->update([
                'tahun' => $this->tahun,
                'terdakwa' => $this->terdakwa,
                'provinsi' => $this->provinsi,
                'kabkota' => $this->kabkota,
                'object' => $this->object,
                'dakwaan' => $this->dakwaan,
                'ancamanuupenjara' => $this->ancamanuupenjara,
                'ancamanuudenda' => $this->ancamanuudenda,
                'tuntutanpenjara' => $this->tuntutanpenjara,
                'tuntutandenda' => $this->tuntutandenda,
                'putusanpenjara' => $this->putusanpenjara,
                'putusandenda' => $this->putusandenda,
                'noputusan' => $this->noputusan,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);
             //passing to toast
             $message = 'Successfully updating putusan perdata';
             $type = 'success'; //error, success
             $this->emit('toast',$message, $type);
        }
    }

    public function render()
    {
        $provincies = $this->getprovinsi();
        $kabkotas = $this->getKabkota();
        return view('livewire.edit-putusan-satwa-component', compact('provincies','kabkotas'));
    }

    public function manualValidation(){
        if($this->tahun == ''){
            $message = 'Tahun is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->terdakwa == ''){
            $message = 'Terdakwa is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->provinsi == '. . .'){
            $message = 'Provinsi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->kabkota == '. . .'){
            $message = 'Kabupaten/Kota is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->object == ''){
            $message = 'Object is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->dakwaan == ''){
            $message = 'Dakwaan is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->ancamanuupenjara == ''){
            $message = 'Ancaman UU Penjara is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->ancamanuudenda == ''){
            $message = 'Ancaman UU Denda is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->tuntutanpenjara == ''){
            $message = 'Tuntutan Penjara is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->tuntutandenda == ''){
            $message = 'Tuntutan Denda is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->putusanpenjara == ''){
            $message = 'Putusan Penjara is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->putusandenda == ''){
            $message = 'Putusan denda is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->noputusan == ''){
            $message = 'No Putusan is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        return true;
    }
}
