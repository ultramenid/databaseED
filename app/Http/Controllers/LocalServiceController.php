<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocalServiceController extends Controller
{
    public function getMarker(){
        $data =  DB::table('eddatabase')
        ->select('kasus','lat', 'long','akibat','bentukancaman','korban', 'pelaku', 'jumlahkorban', 'konflikdengan', 'namapelaku','sektor')
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

    public function index(){
        return $this->getMarker();
    }

    public function getTahun(){
        $res =  DB::table('eddatabase')
        ->selectRaw('YEAR(tanggalkejadian) as YEAR, count(kasus) as jumlahkasus')
        ->groupBy('YEAR')
        ->get();

        $tahun = 0;
        foreach($res as $item){
            $data['tahun'][] = $item->YEAR;
            $data['jumlahkasus'][] = $item->jumlahkasus;
            $tahun += $item->jumlahkasus;
            $data['tambahkasus'][] = $tahun;


        }
        // dd($data);
        return json_encode($data);
    }

    public function getJumlahKorban(){
        $jumlah =   DB::table('eddatabase')
        ->selectRaw('YEAR(tanggalkejadian) as YEAR, sum(jumlahkorban) as korbans')
        ->groupBy('YEAR')
        ->get();
        foreach($jumlah as $item){
            $data['tanggal'][] = $item->YEAR;
            $data['jumlahkorban'][] = $item->korbans;
        }
        // dd($bExecution);
        return json_encode($data);
    }

    public function getBentuk(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('DISTINCT bentukancaman, akibat')
        ->get();
        // dd($jumlah);
        // return $jumlah;
        foreach($jumlah as $item){
            $setdata = array($item->bentukancaman, $item->akibat);
            $data[] = $setdata;
        }
        dd($data);
        // return json_encode($data);
    }
}
