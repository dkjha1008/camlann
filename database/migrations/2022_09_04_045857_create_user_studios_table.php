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
        Schema::create('user_studios', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
			
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
			
            $table->string('website')->nullable();
            $table->string('studio_name')->nullable();
            $table->text('description')->nullable();
			
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
        Schema::dropIfExists('user_studios');
    }
};
