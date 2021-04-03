<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('table_id')->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->bigInteger('permission_type_id')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->bigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisions');
    }
}
