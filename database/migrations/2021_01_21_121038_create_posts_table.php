<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('parent_id')->default(0);
            $table->string('picture')->nullable();
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->string('url')->nullable();
            $table->enum('media',['video','audio'])->default('video');
            $table->enum('post_type',['course','webinar','podcast']);
            $table->string('duration')->nullable();
            $table->enum('cach',['free','money']);
            $table->integer('price')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('archive')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
