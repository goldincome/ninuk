<?php

use App\Models\ServiceType;
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
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('service_type_id')->default(ServiceType::NIN_DEFAULT_ID)->constrained();
            $table->foreignId('our_service_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropConstrainedForeignId('service_type_id');
            $table->dropIfExists('service_type_id');
            $table->dropConstrainedForeignId('our_service_id');
            $table->dropIfExists('our_service_id');
        });
    }
};
