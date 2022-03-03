<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('stat')->default('1')->comment('1: message, 0: join');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('channel_id');
            $table->foreign('channel_id')->references('id')->on('channels');

            $table->text('message')->nullable();
            $table->tinyInteger('is_reply')->default('0');

            $table->unsignedBigInteger('reply_to_id')->nullable();
            $table->foreign('reply_to_id')->references('id')->on('conversations');

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
        Schema::dropIfExists('conversations');
    }
}
