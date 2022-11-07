<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard Kasus - ED Database';
        $nav = 'kasus';
        return view('dashboard', compact('title', 'nav'));
    }

    public function addDatabase(){
        $title = 'Add database kasus';
        $nav = 'kasus';
        return view('addDatabase', compact('title', 'nav'));
    }

    public function editDatabase($id){
        $id = $id;
        $title = 'Edit Database kasus';
        $nav = 'kasus';
        return view('editDatabase', compact('title','id','nav'));
    }
}
