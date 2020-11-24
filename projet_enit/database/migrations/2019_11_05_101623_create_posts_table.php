<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postname');
            $table->string('postname_ar')->nullable();
            $table->string('reference');
            $table->string('qualification');
            $table->integer('postnumber');
            $table->date('date_ouverture');
            $table->integer('period')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('diplomes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('titre');
            $table->string('titre_ar')->nullable();
            $table->string('qualification');
            $table->softDeletes();
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
        Schema::dropIfExists('diplomes');
    }
}
