<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('firstname')->after('id');
            $table->string('lastname')->after('firstname');
            $table->string('address')->after('remember_token')->nullable();
            $table->integer('zip')->after('address')->nullable();
            $table->string('phone')->after('zip')->nullable();
            $table->tinyInteger('is_admin')->default(0)->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('address');
            $table->dropColumn('zip');
            $table->dropColumn('phone');
            $table->dropColumn('is_admin');
        });
    }
}
