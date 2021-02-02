<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateToolNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tool_news', function (Blueprint $table) {
            $table->string('en_title')->nullable()->change();
            $table->string('en_preview')->nullable()->change();
            $table->longtext('en_content')->nullable()->change();
            $table->longtext('en_keyword')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
