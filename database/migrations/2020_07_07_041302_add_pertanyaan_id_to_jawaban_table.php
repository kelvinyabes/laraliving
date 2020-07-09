<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPertanyaanIdToJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawaban', function (Blueprint $table) {
            //
            $table->bigInteger('pertanyaan_id')->unsigned()->nullable(); // menambah kolom baru
            $table->foreign('pertanyaan_id')->references('pertanyaan_id')->on('pertanyaan')->onDelete('cascade'); // menambah foreign key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawaban', function (Blueprint $table) {
            //
            $table->dropForeign(['pertanyaan_id']); // menghapus foreign
            $table->dropColumn(['pertanyaan_id']); // menghapus kolom
        });
    }
}
