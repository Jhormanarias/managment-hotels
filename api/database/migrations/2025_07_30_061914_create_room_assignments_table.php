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
        Schema::create('room_assignments', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('hotel_id')->constrained()->onDelete('cascade');
            $table->string('type');          // Estándar, Junior, Suite
            $table->string('accommodation'); // Sencilla, Doble, etc.
            $table->unsignedInteger('quantity');
            $table->timestamps();

            // Reglas internas:
            $table->unique(['hotel_id', 'type', 'accommodation']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_room_assignments');
    }
};
