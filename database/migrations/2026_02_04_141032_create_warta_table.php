<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('warta', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->integer('minggu_ke');
            $table->date('tanggal');
            $table->string('gdrive_link');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warta');
    }
};
