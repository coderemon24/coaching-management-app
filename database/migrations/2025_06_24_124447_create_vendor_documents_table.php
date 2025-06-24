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
        Schema::create('vendor_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->onDelete('cascade');

            $table->string('business_name')->nullable();
            $table->string('trade_license_no')->nullable();
            $table->string('trade_license_file')->nullable();
            $table->string('nid_or_passport_no')->nullable();
            $table->string('nid_or_passport_file')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('tax_id_file')->nullable();
            $table->enum('document_status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_documents');
    }
};
