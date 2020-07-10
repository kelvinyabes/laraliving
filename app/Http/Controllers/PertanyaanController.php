<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Model custom
use App\Models\PertanyaanModel;
use RealRashid\SweetAlert\Facades\Alert;

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
        $new_pertanyaan->user_id = Auth::id();

        $new_pertanyaan->save();

        Alert::success('Berhasil !!', 'Berhasil menambahkan pertanyaan anda');

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

    //menampilkan Page Pertanyaanku
    public function index2($user_id)
    {
        $pertanyaan = Pertanyaan::all()->where('user_id', $user_id);
        view('pertanyaan.index2', compact('pertanyaan'));
    }
}
