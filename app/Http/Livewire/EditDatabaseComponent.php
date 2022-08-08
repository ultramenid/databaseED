<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager as ImageImageManager;

class EditDatabaseComponent extends Component
{
    use WithFileUploads;
    public $uphoto,$photo, $provinsi = '. . .', $kabkota = '. . .', $kecamatan = '. . .', $desa= '. . .',$pelakus = [], $sumberurl = [], $pelaku, $jeniskelamin, $tglkejadian, $kasus, $issu, $korban, $pekerjaan, $jumlahkorban, $namapelaku, $konflikdengan, $kronologi, $perkembangankasus, $akibat, $bentukancaman, $sektor;
    public $isProvinsi = false, $isKabkota = false, $isKecamatan= false, $isPelaku = false, $isMap = false, $isDesa = false;
    public $idProvinsi, $idKabkota,$idKecamatan, $lat = '', $long = '';
    public $chooseprovinsi = '', $choosekabkota = '', $choosekecamatan ='', $choosepelaku = '', $choosedesa = '', $url , $idDB;

    public function mount($idDB){
        $this->idDB = $idDB;
        $data = DB::table('eddatabase')->where('id', $idDB)->first();
        $this->provinsi = $data->provinsi;
        $this->kabkota = $data->kabkota;
        $this->kecamatan = $data->kecamatan;
        $this->pelakus = explode(',', $data->pelaku);
        $this->sumberurl = explode(',', $data->sumber);
        $this->jeniskelamin = $data->jeniskelamin;
        $this->tglkejadian = $data->tanggalkejadian;
        $this->kasus = $data->kasus;
        $this->issu = $data->issu;
        $this->korban = $data->korban;
        $this->pekerjaan = $data->pekerjaan;
        $this->jumlahkorban = $data->jumlahkorban;
        $this->namapelaku = $data->namapelaku;
        $this->konflikdengan = $data->konflikdengan;
        $this->kronologi = $data->kronologi;
        $this->perkembangankasus = $data->perkembangankasus;
        $this->akibat = $data->akibat;
        $this->bentukancaman = $data->bentukancaman;
        $this->sektor = $data->sektor;
        $this->lat = $data->lat;
        $this->long = $data->long;
        $this->uphoto = $data->img;

    }
    public function uploadImage(){
        $file = $this->photo->store('public/files/photos');
        $foto = $this->photo->hashName();

        $manager = new ImageImageManager();

        // https://image.intervention.io/v2/api/fit
        //crop the best fitting 1:1 ratio (200x200) and resize to 200x200 pixel
        $image = $manager->make('storage/files/photos/'.$foto)->fit(600, 360);
        $image->save('storage/files/photos/thumbnail/'.$foto);
        return $foto;
    }

    public function updatedPhoto($photo){
        // dd($photo->getSize());
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg','webp'])) {
           $this->reset('photo');
           $message = 'Files not supported';
           $type = 'error'; //error, success
           $this->emit('toast',$message, $type);
        }
    }
    public function storeDatabase(){
        // dd($this->idBD);
        if($this->manualValidation()){
            if(!$this->photo){
                $name = $this->uphoto;
            }else{
                try {
                    unlink(storage_path('app/public/files/photos/'.$this->uphoto));
                     unlink(storage_path('app/publicfiles/photos/thumbnail/'.$this->uphoto));
                     $name=  $this->uploadImage();
                } catch (\Throwable $th) {
                   $name=  $this->uploadImage();
                }

            }
            DB::table('eddatabase')
            ->where('id', $this->idDB)
            ->update([
                    'tanggalkejadian' => $this->tglkejadian,
                    'kasus' => $this->kasus,
                    'provinsi' => $this->provinsi,
                    'kabkota' => $this->kabkota,
                    'kecamatan' => $this->kecamatan,
                    'issu' => $this->issu,
                    'korban' => $this->korban,
                    'pekerjaan' => $this->pekerjaan,
                    'jeniskelamin' => $this->jeniskelamin,
                    'jumlahkorban' => $this->jumlahkorban,
                    'pelaku' => $this->getstringPelaku(),
                    'akibat' => $this->akibat,
                    'konflikdengan' => $this->konflikdengan,
                    'bentukancaman' => $this->bentukancaman,
                    'sektor' => $this->sektor,
                    'kronologi' => $this->kronologi,
                    'perkembangankasus' => $this->perkembangankasus,
                    'sumber' => $this->getstringURL(),
                    'lat' => $this->lat,
                    'namapelaku' => $this->namapelaku,
                    'long' => $this->long,
                    'img' => $name,
                    'updated_at' => Carbon::now("Asia/Jakarta")
                ]);
                redirect()->to('/cms/dashboard');
        }
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

    public function checkKasus(){
        return DB::table('eddatabase')
        ->where('tanggalkejadian', $this->tglkejadian)
        ->where('kecamatan', $this->kecamatan)
        ->where('korban', $this->korban)
        ->first();
    }

    public function getstringPelaku(){
        return implode(',', $this->pelakus);
    }

    public function getstringURL(){
        return implode(',', $this->sumberurl);
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

    public function getKecamatan(){
        // $sc = '%' . $this->choosekecamatan . '%';

        // return  DB::table('districts')
        // ->select('id', 'name')
        // ->where('regency_id', $this->idKabkota)
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
                'propertyName' => 'provinsi,kab_kota,kecamatan,lat,long',
                'cql_filter' => "provinsi = '".$this->provinsi."' AND  kab_kota = '".$this->kabkota."' AND  kecamatan LIKE '%". strtoupper($this->choosekecamatan) ."%'",
                'outputFormat' => 'application/json',
            ]);
            $response = json_decode($req, true);
            // $arrUnique = array_unique($response['features'][0]['properties']['provinsi']);

            $res = array();
            foreach ($response['features'] as $each) {
                    array_push($res,[
                        'lat' => $each['properties']['lat'],
                        'long' => $each['properties']['long'],
                        'kecamatan' => $each['properties']['kecamatan']
                    ]);
                }
            // dd($res);
            return array_slice($res, 0, 10);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getDesa(){
        $sc = '%' . $this->choosedesa . '%';

        return  DB::table('villages')
        ->select('id', 'name')
        ->where('district_id', $this->idKecamatan)
        ->where('name', 'like',  $sc)
        ->limit(15)
        ->get();
    }

    public function toogleProvinsi(){
        // $this->provincies = $this->getprovinsi();
        $this->isProvinsi =! $this->isProvinsi;

    }

    public function toogleKabkota(){
        // $this->provincies = $this->getprovinsi();
        $this->isKabkota =! $this->isKabkota;
    }
    public function toogleKecamatan(){
        // $this->provincies = $this->getprovinsi();
        $this->isKecamatan =! $this->isKecamatan;
        // dd($kecamatan);

    }

    public function toogleDesa(){
        // $this->provincies = $this->getprovinsi();
        $this->isDesa =! $this->isDesa;
        // dd($kecamatan);

    }

    public function tooglePelaku(){
        $this->isPelaku = true;
    }

    public function selectProvinsi($value){
        $this->provinsi = $value;
        $this->isProvinsi = false;
        $this->kabkota = '. . . ';
        $this->kecamatan = '. . . ';
        // $this->desa = '. . . ';

    }
    public function selectKabkota($value){
        $this->kabkota = $value;
        $this->isKabkota = false;
        $this->kecamatan = '. . . ';
        // $this->desa = '. . . ';
    }

    public function selectKecamatan($lat, $long, $kecamatan){
        $this->kecamatan = $kecamatan;
        $this->isKecamatan = false;
        // $this->desa='. . .';
        // dd($lat,$long, $kecamatan);
            // dd($response);
            $this->long = $long;
            $this->lat = $lat;
            $this->dispatchBrowserEvent('connected');


    }

    // public function selectDesa($id, $name){
    //     $this->desa = $name;
    //     $this->isDesa = false;
    //     $this->isMap = true;
    //     // dd($name);

    // }
    public function setPelaku($pelaku){
        if (!in_array($pelaku, $this->pelakus)) {
            array_push($this->pelakus, $pelaku);
        }
        $this->choosepelaku = $pelaku;
        $this->pelaku = '';

    }

    public function setsumberURL(){
        if (!in_array($this->url, $this->sumberurl)) {
            array_push($this->sumberurl, $this->url);
        }
        $this->url = '';

    }

    public function closePelaku(){
        $this->isPelaku = false;
    }

    public function deleteTags($id){
        unset($this->pelakus[$id]);


        if($this->pelaku = 'Pelaku Lainya'){
            $this->pelaku = '';
            $this->choosepelaku = '';
        }
    }
    public function deleteURL($id){
        unset($this->sumberurl[$id]);
    }

    public function render()
    {
        $provincies= $this->getprovinsi();
        $kabkotas = $this->getKabkota();
        $kecamatans = $this->getKecamatan();
        return view('livewire.edit-database-component', compact('provincies', 'kabkotas', 'kecamatans'));
    }

    public function manualValidation(){
        if($this->tglkejadian == ''){
            $message = 'Tanggal kejadian is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->kasus == ''){
            $message = 'Kasus is required';
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
        }elseif($this->kecamatan == '. . .'){
            $message = 'Kecamatan is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->issu == ''){
            $message = 'Issu is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->korban == ''){
            $message = 'Korban is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->pekerjaan == ''){
            $message = 'Pekerjaan is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->jeniskelamin == ''){
            $message = 'Jenis kelamin is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->jumlahkorban == ''){
            $message = 'Jumlah Korban is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->bentukancaman == ''){
            $message = 'Bentuk Ancaman is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->sektor == ''){
            $message = 'Sektor is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->kronologi == ''){
            $message = 'Kronologi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->perkembangankasus == ''){
            $message = 'Kronologi is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }elseif($this->sumberurl == ''){
            $message = 'Sumber URL is required';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }

        return true;
    }
}
