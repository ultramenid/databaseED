<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements  FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $start, $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
    public function collection()
    {
        return DB::table('eddatabase')
        ->select('tanggalkejadian', 'kasus', 'provinsi', 'kabkota', 'kecamatan', 'issu', 'korban', 'pekerjaan', 'jeniskelamin','jumlahkorban', 'pelaku', 'namapelaku', 'akibat', 'konflikdengan', 'bentukancaman','sektor', 'kronologi', 'perkembangankasus', 'sumber', 'lat', 'long', 'img', 'created_at', 'updated_at')
        ->whereBetween('tanggalkejadian', [$this->start, $this->end])
        ->get();
    }
    public function headings(): array
    {
        return [
            "tanggalkejadian",
            "kasus",
            "provinsi",
            "kabkota",
            "kecamatan",
            "issu",
            "korban",
            "pekerjaan",
            "jeniskelamin",
            "jumlahkorban",
            "pelaku",
            "namapelaku",
            "akibat",
            "konflikdengan",
            "bentukancaman",
            "sektor",
            "kronologi",
            "perkembangankasus",
            "sumber",
            "lat",
            "long",
            "img",
            "created_at",
            "updated_at",
        ];
    }

}
