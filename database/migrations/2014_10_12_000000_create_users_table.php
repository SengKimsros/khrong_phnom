<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->bigInteger('position_id')->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->text('description')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('status')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->bigInteger('update_by')->nullable();
            $table->timestamps();
        });

        // email: admin@admin.com
        // password : admin123
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>'$2y$10$9UBAs8f5D593.6HTRhERHu7fWr32zBQLzqFqx0KeRt2eE9o53YEBK',
            'gender'=>1,
            'first_name'=>'Admin',
            'last_name'=>'Admin',
            'position_id'=>1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
