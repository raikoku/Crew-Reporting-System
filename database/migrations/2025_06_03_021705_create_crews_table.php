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
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('staff_number')->unique();
            $table->string('rank'); // Use ENUM if preferred
            $table->string('nric');
            $table->string('passport_number');
            $table->date('issue_date');
            $table->date('expired_date');
            $table->string('issue_country');
            $table->string('gender');
            $table->foreignId('flight_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crews');
    }
};
