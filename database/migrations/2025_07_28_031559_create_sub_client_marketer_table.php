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
        Schema::create('sub_client_marketer', function (Blueprint $table) {
            $table->foreignId('sub_client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('marketer_id')->constrained()->cascadeOnDelete();
            $table->primary(['sub_client_id', 'marketer_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_client_marketer');
    }
};
