<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('content')->nullable();
            $table->string('category')->nullable();
            $table->string('featured')->nullable();
            $table->string('multiple_titles')->nullable();
            $table->string('region')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
