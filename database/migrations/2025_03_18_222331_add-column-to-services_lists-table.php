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
        Schema::table('service_lists', function (Blueprint $table) {
            $table->string('image_id')->nullable()->after('slug');
            $table->text('description')->nullable()->after('name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_lists', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('image_id');
        });
    }
};
