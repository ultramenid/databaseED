<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PutusansatwaController extends Controller
{
    public function index(){
        $title = 'Putusan Satwa - ED Database';
        $nav = 'putusansatwa';
        return view('putusansatwa', compact('title', 'nav'));
    }

    public function addPutusansatwa(){
        $title = 'Add Putusan Satwa - ED Database';
        $nav = 'putusansatwa';
        return view('addputusansatwa', compact('title', 'nav'));
    }

    public function editPutusansatwa($id){
        $title = 'Add Putusan Satwa - ED Database';
        $nav = 'putusansatwa';
        $id = $id;
        return view('editputusansatwa', compact('title', 'nav', 'id'));
    }
}
