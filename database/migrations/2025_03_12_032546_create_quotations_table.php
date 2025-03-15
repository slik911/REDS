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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('rfq_id')->nullable();
            $table->string('client_id');
            $table->string('user_id');
            $table->string('quote_number')->unique();
            $table->decimal('sub_total', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('total', 10, 2);
            $table->enum('status', ['draft', 'sent', 'accepted', 'rejected', 'in-progress', 'completed'])->default('draft');

            $table->foreign('rfq_id')->references('uuid')->on('r_f_q_s')->onDelete('cascade');
            $table->foreign('client_id')->references('uuid')->on('clients')->onDelete('cascade');
            $table->foreign('user_id')->references('uuid')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
