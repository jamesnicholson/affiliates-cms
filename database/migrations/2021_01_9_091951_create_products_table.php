<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('affiliate_id')->unsigned()->index()->nullable();
            $table->bigInteger('link_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
            $table->foreign('link_id')->references('id')->on('links');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
