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
        Schema::create('marketer_staff', function (Blueprint $table) {
            $table->id();

            $table->foreignId('marketer_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('staff');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketer_staff');
    }
};
