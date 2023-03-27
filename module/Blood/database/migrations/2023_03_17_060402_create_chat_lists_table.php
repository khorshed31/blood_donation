<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_lists', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('chat_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedBigInteger('sender_id');
            $table->text('chat');
            $table->unsignedTinyInteger('is_read')->default(0);
            
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('chat_lists');
    }
}
