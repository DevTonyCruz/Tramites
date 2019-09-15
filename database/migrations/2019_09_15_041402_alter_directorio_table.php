<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDirectorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directorio', function (Blueprint $table) {
            $table->string('hobbie')->nullable()->after('email');
            $table->string('trabajo')->nullable()->after('hobbie');
            $table->longText('foto')->nullable()->after('trabajo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directorio', function (Blueprint $table) {
            $table->dropColumn('hobbie');
            $table->dropColumn('trabajo');
            $table->dropColumn('foto');
        });
    }
}
