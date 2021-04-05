<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
        DB::table('tables')->insert([
            [
                'name'=>'Projects',
                'status'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Home',
                'status'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Booking',
                'status'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Users',
                'status'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Position',
                'status'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Service',
                'status'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
