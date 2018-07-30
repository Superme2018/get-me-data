<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_tags', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->string("tag", 30);

            // Relation Key.
            $table->unsignedInteger('member_message_id');

            $table->foreign('member_message_id')->references('id')->on('members_messages');
            $table->foreign('member_message_id')->references('id')->on('members_messages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_tags');
    }
}
