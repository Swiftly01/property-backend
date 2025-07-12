<?php

use App\Enums\BuyRequestEnum;
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
        Schema::create('buy_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->enum('status', BuyRequestEnum::values())->default(BuyRequestEnum::PENDING->value)->index();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone_number');
            $table->text('message')->nullable();
            $table->boolean('terms');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_requests');
    }
};
