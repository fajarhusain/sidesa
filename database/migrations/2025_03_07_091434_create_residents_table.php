<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16);
            $table->string('name',100);
            $table->enum('gender',['L','P']);
            $table->string('birthplace',50);
            $table->date('birthdate');
            $table->text('address');
            $table->string('rt',3);
            $table->string('rw',3);
            $table->string('religion',20)->nullable();
            $table->enum('marital_status',['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati']);
            $table->string('work',50);
            $table->string('phone',25)->nullable();
            $table->enum('status',['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
