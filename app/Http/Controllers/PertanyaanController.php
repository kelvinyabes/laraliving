<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Model custom
use App\Models\PertanyaanModel;

// model eloquent
use App\Pertanyaan;

class PertanyaanController extends Controller
{
    
    public function create(){
        return view('pertanyaan.form');
    }
    
    public function store(Request $request){
        // dd($request->all());
        
        // cara custom model
        // $new_pertanyaan = PertanyaanModel::save($request->all());
        
        // cara eloquent dengan instansiasi
        $new_pertanyaan = new Pertanyaan;
        $new_pertanyaan->name = $request['name'];
        $new_pertanyaan->pertanyaan = $request['pertanyaan'];

        $new_pertanyaan->save();
        return redirect('/pertanyaan');
    }
    
    public function index(){
        // $pertanyaan = PertanyaanModel::get_all();
        $pertanyaan = Pertanyaan::all();
        // dd($pertanyaan);
        return view('pertanyaan.index', compact('pertanyaan'));
    }

    public function show($pertanyaan_id){
        $pertanyaan = PertanyaanModel::find_by_id($pertanyaan_id);
        return view('pertanyaan.show', compact('pertanyaan'));
    }

    public function edit($pertanyaan_id){
        $pertanyaan = PertanyaanModel::find_by_id($pertanyaan_id);
            return view('pertanyaan.edit', compact('pertanyaan'));
    }

    public function update($pertanyaan_id, Request $request){
        $pertanyaan = PertanyaanModel::update($pertanyaan_id, $request->all());
        return redirect('/pertanyaan');
    }

    public function destroy($pertanyaan_id){
        $deleted = PertanyaanModel::destroy($pertanyaan_id);
        return redirect('/pertanyaan');
    }
}
