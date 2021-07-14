<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websitesetups', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('site_motto')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('meta_img')->nullable();
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
        Schema::dropIfExists('websitesetups');
    }
}
