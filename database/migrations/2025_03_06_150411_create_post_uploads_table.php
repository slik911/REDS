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
        Schema::create('post_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('post_id');
            $table->string('upload_id');
            $table->foreign('post_id')->references('uuid')->on('posts')->onDelete('cascade');
            $table->foreign('upload_id')->references('uuid')->on('uploads')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_uploads');
    }
};
