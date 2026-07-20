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
        Schema::table('products', function (Blueprint $table) {

            $table->text('banner_subtitle')->nullable()->after('banner_title');

            $table->text('banner_description')->nullable()->after('banner_subtitle');

            $table->string('section_title')->nullable()->after('banner_description');

            $table->text('section_description')->nullable()->after('section_title');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'banner_subtitle',
                'banner_description',
                'section_title',
                'section_description',
            ]);

        });
    }
};