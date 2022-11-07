<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TableAhliComponent extends Component
{
    use WithPagination;
    public $search, $dataOrder = 'desc', $dataField = 'id', $paginate = 10;

    public function sortingField($field){
        $this->dataField = $field;
        $this->dataOrder = $this->dataOrder == 'asc' ? 'desc' : 'asc';
    }
    public function updatedSearch(){
        $this->resetPage();
    }

    public function getDatabase(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('dbahli')
                        ->select('provinsi', 'nama', 'gelar', 'id', 'kriteriaahli', 'jabatan', 'afliasi')
                        ->where('nama', 'like', $sc)
                        ->orderBy($this->dataField, $this->dataOrder)
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function render()
    {
        $databases = $this->getDatabase();
        // dd($databases);
        return view('livewire.table-ahli-component' , compact('databases'));
    }
}
