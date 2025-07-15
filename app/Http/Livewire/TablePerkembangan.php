<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TablePerkembangan extends Component
{
    public $deleteName, $deleteID, $deleter, $isAdd = false, $idDB, $sumberurl = [], $url, $descPerkembangan, $tanggalPerkembangan, $buttonSave, $buttonUpdate;

    public function mount($id)
    {
        $this->idDB = $id;
    }

    public function addPerkembangan()
    {
        $this->isAdd = true;
        $this->buttonSave = true;
        // Toaster::error('test');
    }

    public function clearform()
    {
        $this->url = null;
        $this->sumberurl = [];
        $this->descPerkembangan = null;
        $this->tanggalPerkembangan = null;
    }

    public function closeReason()
    {
        $this->isAdd = false;
        $this->buttonSave = false;
        $this->buttonUpdate = false;
        $this->clearform();
    }
    public function deleteURL($id)
    {
        unset($this->sumberurl[$id]);
    }

    public function setsumberURL()
    {
        if (!in_array($this->url, $this->sumberurl)) {
            array_push($this->sumberurl, $this->url);
        }
        $this->url = '';
    }



    public function manualValidation()
    {
        if ($this->tanggalPerkembangan == '') {
            $message = 'Tanggal is requires';
            $type = 'error'; //error, success
            $this->emit('toast', $message, $type);
            return;
        } elseif ($this->descPerkembangan == '') {
            $message = 'Description  is required';
            $type = 'error'; //error, success
            $this->emit('toast', $message, $type);
            return;
        } elseif ($this->sumberurl == '') {
            $message = 'Sumber is required';
            $type = 'error'; //error, success
            $this->emit('toast', $message, $type);
            return;
        }
        return true;
    }

    public function getPerkembanganFirst()
    {
        return DB::table('perkembangankasus')->where('idKasus', $this->idDB)->first();
    }

    public function editPerkembangan()
    {
        $this->isAdd = true;
        $this->buttonUpdate = true;
        $this->tanggalPerkembangan = $this->getPerkembanganFirst()->waktu;
        $this->descPerkembangan = $this->getPerkembanganFirst()->perkembangankasus;
        $this->sumberurl = explode(',', $this->getPerkembanganFirst()->sumber);
    }

    public function storingUpdate()
    {
        if ($this->manualValidation()) {
            DB::table('perkembangankasus')
                ->where('idKasus', $this->idDB)
                ->update([
                    'waktu' => $this->tanggalPerkembangan,
                    'perkembangankasus' => $this->descPerkembangan,
                    'sumber' => $this->getstringURL(),
                    'updated_at' => Carbon::now('Asia/Jakarta')
                ]);
        }
        $this->clearform();
        $this->closeReason();
    }

    public function closeDelete()
    {
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id)
    {

        //load data to delete function
        $dataDelete = DB::table('perkembangankasus')->where('id', $id)->first();
        $this->deleteName = $dataDelete->waktu;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id)
    {
        DB::table('perkembangankasus')->where('id', $id)->delete();

        $message = 'Successfully delete perkembangan kasus';
        $type = 'success'; //error, success
        $this->emit('toast', $message, $type);


        $this->closeDelete();
    }

    public function getstringURL()
    {
        return implode(',', $this->sumberurl);
    }

    public function storePerkembangan()
    {
        if ($this->manualValidation()) {
            DB::table('perkembangankasus')->insert([
                'idKasus' => $this->idDB,
                'waktu' => $this->tanggalPerkembangan,
                'sumber' => $this->getstringURL(),
                'perkembangankasus' => $this->descPerkembangan,

                'created_at' => Carbon::now("Asia/Jakarta")
            ]);
            $this->clearform();
            $this->closeReason();
        }
    }

    public function getPerkembangan()
    {
        // dd($this->idDB);
        return DB::table('perkembangankasus')->where('idKasus', $this->idDB)->get();
    }
    public function render()
    {
        // dd($this->getPerkembangan());
        $posts = $this->getPerkembangan();
        return view('livewire.table-perkembangan', compact('posts'));
    }
}
