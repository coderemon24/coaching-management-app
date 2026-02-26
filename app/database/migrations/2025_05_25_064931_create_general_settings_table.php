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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();

            $table->string('site_name')->default('Kommerce');
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_title')->nullable();
            $table->string('timezone')->default('UTC');
            $table->string('currency_text')->default('USD');
            $table->string('currency_text_position')->default('USD');
            $table->string('currency_symbol')->default('$');
            $table->string('currency_position')->default('left');
            $table->decimal('currency_rate',10,2)->default('1.00');
            $table->string('site_color')->nullable();
            $table->enum('status',['Active', 'Inactive'])->default('Active');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
