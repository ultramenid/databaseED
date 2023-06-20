<?php

namespace App\Http\Livewire;

use App\Exports\AhliExport;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class TableAhliComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleteID, $deleter;
    public $search, $dataOrder = 'desc', $dataField = 'id', $paginate = 10;

    public function sortingField($field){
        $this->dataField = $field;
        $this->dataOrder = $this->dataOrder == 'asc' ? 'desc' : 'asc';
    }
    public function updatedSearch(){
        $this->resetPage();
    }

    // https://laravel-excel.com/
    public function exportExcel(){
        return  Excel::download(new AhliExport, 'RawDbAhli.xlsx');
    }

    public function getDatabase(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('dbahli')
                        ->select('provinsi', 'nama', 'gelar', 'id', 'kriteriaahli', 'jabatan', 'afliasi', 'keahlian')
                        ->where('nama', 'like', $sc)
                        ->orderBy($this->dataField, $this->dataOrder)
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('dbahli')->where('id', $id)->first();
        $this->deleteName = $dataDelete->nama;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('dbahli')->where('id', $id)->delete();

        $message = 'Successfully delete ahli';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }

    public function render()
    {
        $databases = $this->getDatabase();
        // dd($databases);
        return view('livewire.table-ahli-component' , compact('databases'));
    }
}
