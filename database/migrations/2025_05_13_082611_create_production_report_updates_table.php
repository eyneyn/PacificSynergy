<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('production_report_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_report_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('user_name')->nullable();
            $table->json('changed_fields')->nullable(); // Optional: to store changed attributes
            $table->text('remarks')->nullable(); // Optional: a comment for this update
            $table->timestamps(); // updated_at = when update happened
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('production_report_updates');
    }
};
