<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Model custom
use App\Models\PertanyaanModel;

// sweetalert
use RealRashid\SweetAlert\Facades\Alert;

// model eloquent
use App\Pertanyaan;
use App\User;

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
        
        // sweetalert
        Alert::success('Berhasil !!');

        return redirect('/pertanyaan');
    }
    
    public function index(){
        // $pertanyaan = PertanyaanModel::get_all();
        $pertanyaan = Pertanyaan::all();
        $user = User::all();
        // dd($pertanyaan);

        // sweetalert
        Alert::success('Berhasil !!');

        return view('pertanyaan.index', compact('pertanyaan','user'));
    }

    //menampilkan Page Pertanyaanku
    public function index2($user_id)
    {
        $pertanyaan = Pertanyaan::all()->where('user_id', $user_id);
        return view('pertanyaan.index2', compact('pertanyaan'));
        
        // sweetalert
        Alert::success('Berhasil !!');

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
