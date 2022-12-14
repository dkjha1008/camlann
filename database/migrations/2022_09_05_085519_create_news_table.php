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
        Schema::create('news', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
			
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
			
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->date('publish_date');
            $table->enum('status', ['0', '1']);
			
			
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
        Schema::dropIfExists('news');
    }
};
