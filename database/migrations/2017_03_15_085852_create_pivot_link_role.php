<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotLinkRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_role', function (Blueprint $table) {

        $table->increments('id');
        $table->integer('link_id')->unsigned();
        $table->integer('role_id')->unsigned();

        $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_role', function (Blueprint $table) {

        });
    }
}
