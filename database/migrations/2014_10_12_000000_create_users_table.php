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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', 11)->required();
            $table->string('nama_petugas', 35)->required();
            $table->string('username', 25)->required();
            $table->string('password', 255)->required();
            $table->string('telp', 13)->required();
            $table->enum('level', ['admin', 'petugas', 'masyarakat'])->default('masyarakat')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
