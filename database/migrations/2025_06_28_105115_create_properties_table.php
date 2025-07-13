<?php

use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Enum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sell_request_id')->nullable()->constrained('sell_requests')->nullOnDelete();
            $table->string('title');
            $table->enum('status', PropertyStatusEnum::values());
            $table->enum('type', PropertyTypeEnum::values());
            $table->string('location');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
