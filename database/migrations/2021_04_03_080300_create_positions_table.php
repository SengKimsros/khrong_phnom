<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->bigInteger('updated_by')->nullable();


        });
        DB::table('positions')->insert(
            [
                [
                    'name'=>'Agent',
                    'status'=>1,
                    'created_at'=>now(),
                    'updated_by'=>1
                ],
                [
                    'name'=>'Customer',
                    'status'=>1,
                    'created_at'=>now(),
                    'updated_by'=>1
                ],[
                    'name'=>'Admin',
                    'status'=>1,
                    'created_at'=>now(),
                    'updated_by'=>1
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
