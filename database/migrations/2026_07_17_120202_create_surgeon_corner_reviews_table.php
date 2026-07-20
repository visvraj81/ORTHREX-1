<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surgeon_corner_reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->string('name');
            $table->string('location');
            $table->tinyInteger('rating')->default(5); // 1 to 5
            $table->date('review_date');

            // Static 3 checkboxes
            $table->boolean('response')->default(0);
            $table->boolean('quality')->default(0);
            $table->boolean('delivery')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surgeon_corner_reviews');
    }
};
