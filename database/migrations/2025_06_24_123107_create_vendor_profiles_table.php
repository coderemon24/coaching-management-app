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
        Schema::create('vendor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('shop_name')->unique()->nullable()->index();
            $table->string('shop_slug')->unique()->nullable();
            $table->string('shop_logo')->nullable();
            $table->string('shop_banner')->nullable();
            $table->text('shop_description')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('shop_phone')->nullable();
            $table->string('shop_email')->nullable();

            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_profiles');
    }
};
