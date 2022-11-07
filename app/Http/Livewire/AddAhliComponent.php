<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AddAhliComponent extends Component
{
    public $provinsi = '. . .', $chooseprovinsi, $keahlian , $customkeahlian, $kriteriaahli, $nama, $gelar, $afliasi, $jabatan, $telp, $email, $publikasi, $stasi, $catatan;
    public $isProvinsi, $isKeahlian = true;


    public function backtokeahlian(){
        $this->isKeahlian = true;
        $this->keahlian = '';
    }

    public function updatedKeahlian($value){
        // dd($value);
        if($value == 'custom'){
            $this->isKeahlian = false;
        }
    }
    public function selectProvinsi($value){
        // dd($value);
        $this->provinsi = $value;
        $this->isProvinsi = false;


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

    public function storeDatabase(){
        if($this->manualValidation()){
            DB::table('dbahli')->insert([
                'kriteriaahli' => $this->kriteriaahli,
                'nama' => $this->nama,
                'gelar' => $this->gelar,
                'jabatan' => $this->jabatan,
                'afliasi' => $this->afliasi,
                'telp' => $this->telp,
                'email' => $this->email,
                'publikasi' => $this->publikasi,
                'stasi' => $this->stasi,
                'keahlian' => ($this->keahlian == 'custom') ? $this->customkeahlian : $this->keahlian,
                'provinsi' => $this->provinsi,
                'catatan' => $this->catatan,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);
            redirect()->to('/cms/dbahli');
        }
    }

    public function render()
    {
        $provincies= $this->getprovinsi();
        return view('livewire.add-ahli-component', compact('provincies'));
    }


    public function manualValidation(){
        if($this->kriteriaahli == ''){
            $message = 'Kriteria Ahli is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->nama == ''){
            $message = 'Nama is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->gelar == ''){
            $message = 'Gelar is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->jabatan == ''){
            $message = 'Jabatan is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->afliasi == ''){
            $message = 'Afliasi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->telp == ''){
            $message = 'Telp is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->email == ''){
            $message = 'Email is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->publikasi == ''){
            $message = 'Publikasi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->stasi == ''){
            $message = 'Stasi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->provinsi == ''){
            $message = 'Provinsi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }


        return true;
    }
}
