<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ToogleFilterComponent extends Component
{

    public $isFilter, $start = "2014-01-01", $end;

    public function mount(){
        $this->end = Carbon::now('Asia/Jakarta')->format('Y-m-d');
    }
    public function setToogle(){
        $this->isFilter = true;
    }

    public function getMarker(){
        $data =  DB::table('eddatabase')
        ->select('tanggalkejadian','kasus','lat', 'long','akibat','bentukancaman','korban', 'pelaku', 'jumlahkorban', 'konflikdengan', 'namapelaku','sektor')
        ->whereBetween('tanggalkejadian', [$this->start, $this->end])
        ->get();
        $original_data = json_decode($data, true);
        // dd($original_data);
        $features = array();

        foreach($original_data as $key => $value) {
            $features[] = array(
                    'type' => 'Feature',
                        'geometry' => array('type' => 'Point',
                            'coordinates' => array((float)$value['lat'],
                            (float)$value['long'])
                        ),
                        'properties' => array(
                            'kasus' => $value['kasus'],
                            'akibat' => $value['akibat'],
                            'bentukancaman' => $value['bentukancaman'],
                            'korban' => $value['korban'],
                            'pelaku' => $value['pelaku'],
                            'jumlahkorban' => $value['jumlahkorban'],
                            'konflikdengan' => $value['konflikdengan'],
                            'namapelaku' => $value['namapelaku'],
                            'sektor' => $value['sektor'],
                            'lat' => $value['lat'],
                            'long' => $value['long'],
                        ),
                    );
            };

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
        return json_encode($allfeatures, JSON_PRETTY_PRINT);
    }
    public function getTahun(){
        try {
            $res =  DB::table('eddatabase')
            ->selectRaw('YEAR(tanggalkejadian) as YEAR, count(kasus) as jumlahkasus')
            ->whereBetween('tanggalkejadian', [$this->start, $this->end])
            ->groupBy('YEAR')
            ->get();

            $tahun = 0;
            foreach($res as $item){
                $data['tahun'][] = $item->YEAR;
                $data['jumlahkasus'][] = $item->jumlahkasus;
                $tahun += $item->jumlahkasus;
                $data['tambahkasus'][] = $tahun;


            }
            return json_encode($data);
        } catch (\Throwable $th) {
            return [];
        }

    }

    public function getGender(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('SUM(jeniskelamin="LAKI-LAKI") as laki, SUM(jeniskelamin ="PEREMPUAN") as perempuan, SUM(jeniskelamin = "LAKI-LAKI & PEREMPUAN") as lakiperempuan')
        ->whereBetween('tanggalkejadian', [$this->start, $this->end])
        ->first();

            $data['laki'][] = $jumlah->laki;
            $data['perempuan'][] = $jumlah->perempuan;
            $data['lakiperempuan'][] = $jumlah->lakiperempuan;


        return json_encode($data);
    }

    public function getJumlahKorban(){
        $jumlah=  DB::table('eddatabase')
        ->selectRaw('YEAR(tanggalkejadian) as YEAR, sum(jumlahkorban) as korbans')
        ->groupBy('YEAR')
        ->whereBetween('tanggalkejadian', [$this->start, $this->end])
        ->get();
        foreach($jumlah as $item){
            $data['tahun'][] = $item->YEAR;
            $data['jumlahkorban'][] = $item->korbans;
        }
        // dd($bExecution);
        return json_encode($data);
    }

    public function getBentuk(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('DISTINCT bentukancaman, akibat')
        ->whereBetween('tanggalkejadian', [$this->start, $this->end])
        ->get();

        // dd($jumlah);
        foreach($jumlah as $item){
            $setdata = array($item->bentukancaman, $item->akibat, getUpdateScore($item->bentukancaman, $item->akibat, $this->start, $this->end));
            $data[] = $setdata;
        }
        // dd($data);
        return json_encode($data);
    }

    public function getSektor(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('SUM(sektor="Lingkungan Hidup") as lingkunganhidup, SUM(sektor ="Hutan") as hutan, SUM(sektor = "Kebun") as kebun,SUM(sektor = "Tambang") as tambang, SUM(sektor = "Energi") as energi,   SUM(sektor = "Tanah/Tanah Adat") as tanahadat, SUM(sektor = "Perairan dan Kelautan") as perairan')
        ->whereBetween('tanggalkejadian', [$this->start, $this->end])
        ->first();
        // dd($jumlah);
        // return $jumlah;
            $data['lingkunganhidup'][] = $jumlah->lingkunganhidup;
            $data['hutan'][] = $jumlah->hutan;
            $data['kebun'][] = $jumlah->kebun;
            $data['tambang'][] = $jumlah->tambang;
            $data['energi'][] = $jumlah->energi;
            $data['tanahadat'][] = $jumlah->tanahadat;
            $data['perairan'][] = $jumlah->perairan;


        // dd($data);
        return json_encode($data);
    }

    public function emitFilter(){

        if(!$this->getTahun()){
            $this->isFilter = false;
            $message = 'Data Not Found';
            $type = 'error'; //error, success
            $this->emit('toast',$message, $type);
            return;
        }
        // dd($this->getBentuk());
        $this->emit('updateMap', $this->getMarker());
        $this->emit('updateTahun', $this->getTahun());
        $this->emit('updateGender', $this->getGender());
        $this->emit('updateJumlahKorban', $this->getJumlahKorban());
        $this->emit('updateSankey', $this->getBentuk());
        $this->emit('updateSektor', $this->getSektor());
        $this->emit('updateTable', $this->start, $this->end);


        $this->isFilter = false;

    }

    public function render()
    {
        return view('livewire.toogle-filter-component');
    }
}
