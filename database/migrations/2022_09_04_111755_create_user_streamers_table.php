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
        Schema::create('user_streamers', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->id();
			
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
			
            $table->string('twitter');
            $table->text('links')->nullable();
			$table->string('visibility');
			$table->string('youtube_channel');
			$table->string('twitch_channel');
            $table->text('link_videos')->nullable();
			
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
        Schema::dropIfExists('user_streamers');
    }
};
