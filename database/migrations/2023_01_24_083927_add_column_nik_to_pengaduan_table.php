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
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->char('nik', 16)->after('tgl_pengaduan')->required();
            $table->foreign('nik')->references('nik')->on('masyarakat')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropForeign('pengaduan_nik_foreign');
            $table->dropColumn('nik');
        });
    }
};
