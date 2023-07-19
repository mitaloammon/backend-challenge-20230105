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
        Schema::create('product_parser_a_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_parser_id');
            $table->enum('status', ['draft', 'trash', 'published'])->default('draft');
            $table->timestamp('imported_t')->useCurrent();
            $table->string('description');
            $table->string('name');
            $table->timestamps();

            $table->foreign('product_parser_id')->references('id')->on('product_parsers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_parser_a_p_i_s');
    }
};
