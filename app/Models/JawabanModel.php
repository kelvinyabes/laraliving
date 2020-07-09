<?php 


namespace App\Models;
use Illuminate\Support\Facades\DB;

class JawabanModel{
    public static function get_all(){
        $jawaban = DB::table('jawaban')->get();
        return $jawaban;
    }

    public static function save($data){
        unset($data["_token"]);
        $new_jawaban = DB::table('jawaban')->insert($data);
        return $new_jawaban;
    }

    public static function find_by_pertanyaan_id($pertanyaan_id){
        $jawaban = DB::table('jawaban')->where('pertanyaan_id', $pertanyaan_id)->get();
        return $jawaban;
    }

    // relationship many-to-one ke tabel user
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    // relationship many-to-one ke tabel pertanyaan 
    public function pertanyaan()
    {
        return $this->belongsTo('App\Models\PertanyaanModels', 'pertanyaan_id');
    }
}
