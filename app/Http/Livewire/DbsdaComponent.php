<?php

namespace App\Http\Livewire;

use App\Exports\SDAExport;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class DbsdaComponent extends Component
{
    public $deleteName, $deleteID, $deleter;
    public $dataField = 'tahun', $dataOrder = 'asc', $paginate = 10, $search = '';

    public function sortingField($field){
        $this->dataField = $field;
        $this->dataOrder = $this->dataOrder == 'asc' ? 'desc' : 'asc';
    }

    // https://laravel-excel.com/
    public function exportExcel(){
        return  Excel::download(new SDAExport, 'RawSDAExport.xlsx');
    }

    protected $listeners = ['updateTable' => 'setFilter'];
    public function setFilter($start, $end){
        $this->resetPage();
    }
    public function getSDA(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('dbkasussda')
                        ->select('id','tahun', 'namaterdakwa', 'statusterdakwa', 'nomorperkara', 'wilayah', 'sektor', 'nilaikerugian', 'dakwaan')
                        ->where('namaterdakwa', 'like', $sc)
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
        $dataDelete = DB::table('dbkasussda')->where('id', $id)->first();
        $this->deleteName = $dataDelete->namaterdakwa;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('dbkasussda')->where('id', $id)->delete();

        $message = 'Successfully delete SDA';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }
    public function render()
    {
        // dd($this->getSDA());
        $databases = $this->getSDA();
        return view('livewire.dbsda-component', compact('databases'));
    }
}
