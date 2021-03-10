<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('name');
            $table->string('url');
            $table->mediumText('small_description')->nullable();
            $table->string('image');

            $table->string('p_highlight_heading')->nullable();
            $table->longText('p_highlights')->nullable();
            $table->string('p_description_heading')->nullable();
            $table->longText('p_description')->nullable();
            $table->string('p_dettails_heading')->nullable();
            $table->longText('p_details')->nullable();

            $table->string('sale_tag')->nullable();
            $table->integer('original_price')->nullable();
            $table->integer('offer_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('priority')->default('0');

            $table->tinyInteger('new_arrival_products')->default('0');
            $table->tinyInteger('featured_products')->default('0');
            $table->tinyInteger('popular_products')->default('0');
            $table->tinyInteger('offers_products')->default('0');
            $table->tinyInteger('status')->default('0');

            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
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
