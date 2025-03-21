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
            $table->unsignedBigInteger('avatar')->nullable()->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            
            $table->foreign('avatar')->references('id')->on('upload_files')->onDelete('set null');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('avatar');
            $table->dropColumn('avatar');
            $table->dropForeign('role_id');
            $table->dropColumn('role_id');
        });
    }
};
