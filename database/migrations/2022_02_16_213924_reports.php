<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reports', function (Blueprint $table) {
            $table->id();
            $table->integer('report_type')->default(0);
            $table->integer('author')->nullable();
            $table->string('reported_player');
            $table->string('informations')->nullable();
            $table->integer('status')->default(0);
            $table->integer('solved_by')->nullable();
            $table->string('answer')->nullable();
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
        Schema::dropIfExists('Reports');
    }
}
