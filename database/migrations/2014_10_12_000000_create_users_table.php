<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();

            $table->enum('role', ['admin', 'studio', 'reporter', 'streamer'])->default('studio');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->string('contact_number')->nullable();
            $table->enum('status', ['0', '1', '2'])->default('1');
            
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'role' => 'admin',
            'first_name' => 'Jhon',
            'last_name' => 'Wick',
            'email' => 'admin@yopmail.com',
            'password' => Hash::make('12345678')
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
};
