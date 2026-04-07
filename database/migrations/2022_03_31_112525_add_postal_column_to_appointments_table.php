<?php

use App\Models\Appointment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostalColumnToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('card_type')->nullable()->default(Appointment::CARD_TYPE_PRINT_OUT);
            $table->string('postal_code')->nullable();
            $table->string('delivery_address')->nullable();
            $table->float('delivery_cost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['card_type', 'postal_code', 'delivery_address']);
        });
    }
}
