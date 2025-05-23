<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('medrec_number')->unique();
            $table->string('name');
            $table->enum('gender', ['M', 'F']);
            $table->string('email')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
