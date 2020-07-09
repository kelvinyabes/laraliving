<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabanModel;

class JawabanController extends Controller
{
    
    public function store($pertanyaan_id, Request $request){
        $data = $request->all();
        // dd($data);
        unset($data['_token']);
        JawabanModel::save($data);
        return redirect('/pertanyaan');
    }
    
    public function index($pertanyaan_id){
        // dd('jawaban');
        $jawaban = JawabanModel::find_by_pertanyaan_id($pertanyaan_id);
        return view('pertanyaan.jawaban', compact('jawaban'));
    }
}
