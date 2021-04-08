<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->nullable();
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('content')->nullable();
            $table->text('description')->nullable();
            $table->double('price')->nullable();
            $table->double('size')->nullable();
            $table->bigInteger('bed_rooms')->nullable();
            $table->bigInteger('bath_rooms')->nullable();
            $table->text('image')->nullable();
            $table->bigInteger('currency_id')->nullable();
            $table->boolean('status')->nullable()->comment('');
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
        Schema::dropIfExists('homes');
    }
}
