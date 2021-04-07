<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('plan')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->text('city')->nullable();
            $table->text('location')->nullable();
            $table->bigInteger('number_of_block')->nullable();
            $table->bigInteger('number_of_floor')->nullable();
            $table->bigInteger('number_of_flat')->nullable();
            $table->double('lowest_price')->nullable();
            $table->double('max_price')->nullable();
            $table->bigInteger('currency_id')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('create_at')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
