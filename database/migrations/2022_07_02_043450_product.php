<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('category_id');
            $table->string('name');
            $table->string('slug');
            $table->integer('sex');
            $table->longtext('images'); 
            $table->longtext('metadata'); 
            $table->longText('property');
            $table->longtext('description'); 
            $table->longtext('detail'); 
            $table->integer('price'); 
            $table->integer('trending')->default(0);
            $table->integer('view')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
