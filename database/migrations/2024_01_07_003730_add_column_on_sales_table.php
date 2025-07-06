<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->date('date')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->date('date_in')->nullable();
            $table->date('date_out')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('name');
            $table->dropColumn('country');
            $table->dropColumn('date_in');
            $table->dropColumn('date_out');
        });
    }
}
