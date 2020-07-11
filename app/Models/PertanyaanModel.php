<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;

class PertanyaanModel
{
    public static function get_all()
    {
        $pertanyaan = DB::table('pertanyaan')->get();
        return $pertanyaan;
    }

    public static function save($data)
    {
        unset($data["_token"]);
        $new_pertanyaan = DB::table('pertanyaan')->insert($data);
        return $new_pertanyaan;
    }

    public static function find_by_id($pertanyaan_id)
    {
        $pertanyaan = DB::table('pertanyaan')->where('pertanyaan_id', $pertanyaan_id)->first();
        return $pertanyaan;
    }

    public static function update($pertanyaan_id, $request)
    {
        $pertanyaan = DB::table('pertanyaan')
            ->where('pertanyaan_id', $pertanyaan_id)
            ->update([
                'name' => $request['name'],
                'pertanyaan' => $request['pertanyaan'],
            ]);
        return $pertanyaan;
    }

    public static function destroy($pertanyaan_id)
    {
        $deleted = DB::table('pertanyaan')
            ->where('pertanyaan_id', $pertanyaan_id)
            ->delete();
        return $deleted;
    }
}
