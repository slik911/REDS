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
        Schema::create('r_f_q_s', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('client_id');
            $table->string('RFQ_number')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('province');
            $table->string('city');
            $table->string('postal_code');
            $table->boolean('status');
            $table->boolean('is_quotation_sent')->default(false);
            $table->softDeletes();
            $table->foreign('client_id')->references('uuid')->on('clients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_f_q_s');
    }
};
