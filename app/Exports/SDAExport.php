<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SDAExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('dbkasussda')
        ->select('tahun', 'namaterdakwa', 'statusterdakwa', 'nomorperkara', 'wilayah', 'jeniskasus', 'sektor', 'nilaikerugian', 'dakwaan', 'tuntutanpenjara', 'tuntutandenda', 'tuntutangantirugi', 'tuntutanpemulihan', 'tuntutansitaaset', 'pnpenjara', 'pndenda', 'pngantirugi', 'pnpemulihan', 'pnsitaaset', 'ptpenjara', 'ptdenda', 'ptgantirugi', 'ptpemulihan', 'ptsitaaset', 'mapenjara', 'madenda', 'magantirugi', 'mapemulihan', 'masitaaset',  'tglupdate')
        ->get();
    }

    public function headings(): array
    {
        return [
            "Tahun",
            "Nama Terdakwa",
            "Status Terdakwa",
            "Nomor Perkara",
            "Wilayah",
            "Jenis Kasus",
            "Sektor",
            "Nilai Kerugian",
            "Dakwaan",
            "Tuntutan Penjara",
            "Tuntutan Denda",
            "Tuntutan Ganti Rugi",
            "Tuntutan Pemulihan",
            "Tuntutan Sita Aset",
            "Vonis PN Penjara",
            "Vonis PN Denda",
            "Vonis PN Ganti Rugi",
            "Vonis PN Pemuliham",
            "Vonis PN Sita Aset",
            "Vonis PT Penjara",
            "Vonis PT Denda",
            "Vonis PT Ganti Rugi",
            "Vonis PT Pemuliham",
            "Vonis PT Sita Aset",
            "Vonis MA Penjara",
            "Vonis MA Denda",
            "Vonis MA Ganti Rugi",
            "Vonis MA Pemuliham",
            "Vonis MA Sita Aset",
            "Tanggal Update"
        ];
    }
}
