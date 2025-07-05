<?php

use App\Enums\PropertyTypeEnum;
use App\Enums\SellRequestStatusEnum;
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
        Schema::create('sell_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('location')->nullable();
            $table->string('address');
            $table->text('description');
            $table->enum('property_type', array_column(PropertyTypeEnum::cases(), 'value'))->index();
            $table->enum('status', array_column(SellRequestStatusEnum::cases(), 'value'))
                ->default(SellRequestStatusEnum::PENDING->value)
                ->index();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_requests');
    }
};
