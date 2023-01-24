<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tanggapan', function (Blueprint $table) {
            $table->integer('id_pengaduan')->after('id')->required();
            $table->foreign('id_pengaduan')->references('id')->on('pengaduan')->onDelete('restrict');
            $table->integer('id_petugas')->required();
            $table->foreign('id_petugas')->references('id')->on('petugas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tanggapan', function (Blueprint $table) {
            $table->dropForeign(['id_pengaduan']);
            $table->dropColumn('id_pengaduan');
            $table->dropForeign(['id_petugas']);
            $table->dropColumn('id_petugas');
        });
    }
};
