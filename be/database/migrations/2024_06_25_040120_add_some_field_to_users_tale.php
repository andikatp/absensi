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
        Schema::table('users', function (Blueprint $table) {
            // position
            $table->string('position')->nullable();
            // department
            $table->string('department')->nullable();
            // face_embedding
            $table->string('face_embedding')->nullable();
            // image_url
            $table->string('image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // position
            $table->dropColumn('position');
            // department
            $table->dropColumn('department');
            // face_embedding
            $table->dropColumn('face_embedding');
            // image_url
            $table->dropColumn('image_url');
        });
    }
};
