<?php

use Illuminate\Support\Facades\DB;

function getScore($bentukancaman, $akibat){
    $score =  DB::table('eddatabase')
    ->whereRaw('bentukancaman = "'.$bentukancaman.'" and akibat = "'.$akibat.'"')
    ->count('kasus');
    return $score;
}

function getUpdateScore($bentukancaman, $akibat, $start, $end){
    $score =  DB::table('eddatabase')
    ->whereRaw('bentukancaman = "'.$bentukancaman.'" and akibat = "'.$akibat.'"')
    ->whereBetween('tanggalkejadian', [$start, $end])
    ->count('kasus');
    return $score;
}
