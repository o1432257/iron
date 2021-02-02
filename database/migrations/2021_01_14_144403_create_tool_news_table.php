<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_news', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->integer('author_id');
            $table->string('title');
            $table->string('en_title');
            $table->string('preview');
            $table->string('en_preview');
            $table->longtext('content');
            $table->longtext('en_content');
            $table->longtext('keyword');
            $table->longtext('en_keyword');
            $table->longtext('img');
            $table->date('date');
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
        Schema::dropIfExists('tool_news');
    }
}
