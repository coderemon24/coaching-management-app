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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('unique_id')->unique()->nullable();
            $table->bigInteger('language_id')->nullable();
            $table->string('cat_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('cat_image')->nullable();
            $table->string('cat_status')->nullable();
            $table->string('is_featured')->default('inactive');
            $table->string('cat_order')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
