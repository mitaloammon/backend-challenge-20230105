<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_parsers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code');
            $table->string('url');
            $table->string('status')->nullable();
            $table->dateTime('imported_t')->nullable()->date;
            $table->string('creator');
            $table->timestamp('created_t');
            $table->timestamp('last_modified_t');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('brands');
            $table->string('categories');
            $table->string('labels');
            $table->string('cities');
            $table->string('purchase_places');
            $table->string('stores');
            $table->text('ingredients_text');
            $table->string('traces');
            $table->string('serving_size');
            $table->float('serving_quantity');
            $table->integer('nutriscore_score');
            $table->string('nutriscore_grade');
            $table->string('main_category');
            $table->string('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_parsers');
    }
};
