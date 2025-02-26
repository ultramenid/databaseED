<?php

namespace App\Http\Livewire;

use App\Exports\gugatanPerdataExport;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class GugatanPerdataComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleteID, $deleter;
    public $dataField = 'tahun', $dataOrder = 'desc', $paginate = 10, $search = '';

     // https://laravel-excel.com/
     public function exportExcel(){
        return  Excel::download(new gugatanPerdataExport, 'GugatanPerdata.xlsx');
    }
    public function sortingField($field){
        $this->dataField = $field;
        $this->dataOrder = $this->dataOrder == 'asc' ? 'desc' : 'asc';
    }

    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('dbkasusperdata')->where('id', $id)->first();
        $this->deleteName = $dataDelete->namapenggugat;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('dbkasusperdata')->where('id', $id)->delete();

        $message = 'Successfully delete gugatan perdata';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }
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
