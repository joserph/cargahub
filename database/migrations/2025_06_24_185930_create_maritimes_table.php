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
        Schema::create('maritimes', function (Blueprint $table) {
            $table->id();

            $table->integer('shipment');
            $table->string('bl');
            $table->string('booking');
            $table->string('carrier');
            $table->foreignId('logistic_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->date('arrival_date');
            $table->string('plate')->nullable();
            $table->string('container_number')->nullable();
            $table->string('seal_bottle')->nullable();
            $table->string('seal_cable')->nullable();
            $table->string('seal_sticker')->nullable();
            $table->boolean('floor')->default(false);
            $table->integer('num_pallets')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_update')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('users');
            $table->boolean('fb_status')->default(false);
            $table->boolean('hb_status')->default(true);
            $table->boolean('qb_status')->default(true);
            $table->boolean('eb_status')->default(true);
            $table->boolean('db_status')->default(false);

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maritimes');
    }
};
