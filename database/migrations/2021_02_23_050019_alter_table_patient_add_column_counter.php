<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePatientAddColumnCounter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('counter')->default(0)->after('description');
            $table->boolean('active')->default(false)->after('counter');
            $table->string('notes')->nullable()->after('active');
            $table->string('qr_link')->nullable()->after('notes');
            $table->string('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('counter');
            $table->dropColumn('active');
        });
    }
}
