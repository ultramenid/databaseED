<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GugatanPerdataController extends Controller
{
    public function index(){
        $title = 'Gugatan Perdata - ED Database';
        $nav = 'gugatanperdata';
        return view('gugatanperdata', compact('title', 'nav'));
    }
    public function addGugatanPerdata(){
        $title = 'Add Gugatan Perdata - ED Database';
        $nav = 'gugatanperdata';
        return view('addgugatan', compact('title', 'nav'));
    }

    public function editperdata($id){
        $title = 'Edit Gugatan Perdata - ED Database';
        $id = $id;
        $nav = 'gugatanperdata';
        return view('editgugatan', compact('title', 'nav', 'id'));
    }
}
