<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('settings', function (Blueprint $table) {
        $table->string('instagram')->nullable();
        $table->string('instagram_pemuda')->nullable();
        $table->string('instagram_anak')->nullable();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
