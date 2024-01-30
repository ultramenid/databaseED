<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class GugatanPerdataComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleteID, $deleter;
    public $dataField = 'tahun', $dataOrder = 'desc', $paginate = 10, $search = '';

    public function getSDA(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('dbkasusperdata')
                        ->select('id','tahun', 'namapenggugat', 'namatergugat', 'nomorperkara', 'wilayah', 'sektor', 'nilaikerugian', 'dakwaan')
                        ->where('namapenggugat', 'like', $sc)
                        ->orderBy($this->dataField, $this->dataOrder)
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function render(){
        // dd($this->getSDA());
        $databases = $this->getSDA();
        return view('livewire.gugatan-perdata-component', compact('databases'));
    }
}
