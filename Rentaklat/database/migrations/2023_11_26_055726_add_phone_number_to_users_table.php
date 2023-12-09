<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In the up method
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('phone_number')->nullable()->unique();
    });
}

// In the down method
public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('phone_number');
    });
}

};
