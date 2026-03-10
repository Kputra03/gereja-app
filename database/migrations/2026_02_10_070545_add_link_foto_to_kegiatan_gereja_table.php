<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kegiatan_gereja', function (Blueprint $table) {
            $table->string('link_foto')->nullable()->after('tanggal');
        });
    }

    public function down(): void
    {
        Schema::table('kegiatan_gereja', function (Blueprint $table) {
            $table->dropColumn('link_foto');
        });
    }
};
