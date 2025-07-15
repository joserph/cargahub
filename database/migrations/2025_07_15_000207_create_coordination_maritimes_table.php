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
        Schema::create('coordination_maritimes', function (Blueprint $table) {
            $table->id();

            $table->string('hawb');
            $table->string('fb')->nullable();
            $table->string('hb')->nullable();
            $table->string('qb')->nullable();
            $table->string('eb')->nullable();
            $table->string('db')->nullable();
            $table->decimal('fulls', 10, 3)
                ->storedAs('
                    COALESCE(fb, 0) * 1 +
                    COALESCE(hb, 0) * 0.5 +
                    COALESCE(qb, 0) * 0.25 +
                    COALESCE(eb, 0) * 0.125 +
                    COALESCE(db, 0) * 0.0625
                ');
            $table->integer('pieces')
                ->storedAs('
                    COALESCE(fb, 0) +
                    COALESCE(hb, 0) +
                    COALESCE(qb, 0) +
                    COALESCE(eb, 0) +
                    COALESCE(db, 0)
                ');

            $table->string('fb_r')->nullable();
            $table->string('hb_r')->nullable();
            $table->string('qb_r')->nullable();
            $table->string('eb_r')->nullable();
            $table->string('db_r')->nullable();
            $table->decimal('fulls_r', 10, 3)
                ->storedAs('
                    COALESCE(fb, 0) * 1 +
                    COALESCE(hb, 0) * 0.5 +
                    COALESCE(qb, 0) * 0.25 +
                    COALESCE(eb, 0) * 0.125 +
                    COALESCE(db, 0) * 0.0625
                ')->nullable();
            $table->integer('pieces_r')
                ->storedAs('
                    COALESCE(fb, 0) +
                    COALESCE(hb, 0) +
                    COALESCE(qb, 0) +
                    COALESCE(eb, 0) +
                    COALESCE(db, 0)
                ')->nullable();
            $table->string('returns')->nullable();
            $table->foreignId('client_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('farm_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('maritime_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('variety_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_update')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('users');
            $table->foreignId('marketer_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('observation')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordination_maritimes');
    }
};
