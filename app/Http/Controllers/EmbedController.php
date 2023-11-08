<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmbedController extends Controller
{
    public function map(){
        $data = $this->getMap();
        $title = 'Embed map';
        return view('embed.map', compact('title', 'data'));
    }
    public function jumlahkorban(){
        $title = 'Embed jumlah korban';
        $korbans = $this->getJumlahKorban();
        return view('embed.jumlahkorban', compact('title', 'korbans'));
    }

    public function sektor(){
        $title = 'Embed sektor';
        $sektors = $this->getSektor();
        return view('embed.sektor', compact('title', 'sektors'));
    }

    public function jumlahkasus(){
        $tahuns = $this->getTahun();
        $title = 'Embed jumlah kasus';
        return view('embed.jumlahkasus', compact('title', 'tahuns'));
    }

    public function bentukancaman(){
        $title = 'Embed bentuk ancaman';
        $bentuktest = $this->getBentukTest();
        return view('embed.bentukancaman', compact('title', 'bentuktest'));
    }

    public function getBentukTest(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('DISTINCT bentukancaman, akibat')
        ->get();
        // dd($jumlah);
        // return $jumlah;
        foreach($jumlah as $item){
            $setdata = array($item->bentukancaman, $item->akibat, getScore($item->bentukancaman, $item->akibat));
            $data[] = $setdata;
        }
        // dd($data);
        return json_encode($data);
    }

    public function gender(){
        $title = 'Embed gender';
        $genders = $this->getGenders();
        return view('embed.gender', compact('title', 'genders'));
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

    public function getGenders(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('SUM(jeniskelamin="LAKI-LAKI") as laki, SUM(jeniskelamin ="PEREMPUAN") as perempuan, SUM(jeniskelamin = "LAKI-LAKI & PEREMPUAN") as lakiperempuan')
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
        ->get();
        foreach($jumlah as $item){
            $data['tahun'][] = $item->YEAR;
            $data['jumlahkorban'][] = $item->korbans;
        }
        // dd($bExecution);
        return json_encode($data);
    }

    public function getSektor(){
        $jumlah =  DB::table('eddatabase')
        ->selectRaw('SUM(sektor="Lingkungan Hidup") as lingkunganhidup, SUM(sektor ="Hutan") as hutan, SUM(sektor = "Kebun") as kebun,SUM(sektor = "Tambang") as tambang, SUM(sektor = "Energi") as energi,   SUM(sektor = "Tanah/Tanah Adat") as tanahadat, SUM(sektor = "Perairan dan Kelautan") as perairan')
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

    public function getMap(){
        $jumlah=  DB::table('eddatabase')
        ->selectRaw('provinsi, count(kasus) as kasus')
        ->groupBy('provinsi')
        ->get();

        $data = array();
        foreach($jumlah as $item){
            $data[$item->provinsi] = $item->kasus;
        }
        // dd($bExecution);
        return json_encode($data);
    }
}
