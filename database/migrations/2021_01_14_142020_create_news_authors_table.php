<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('en_name');
            $table->longtext('company');
            $table->longtext('en_company');
            $table->longtext('companySummary');
            $table->longtext('en_companySummary');
            $table->longtext('companyWebsite');
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
        Schema::dropIfExists('news_authors');
    }
}
