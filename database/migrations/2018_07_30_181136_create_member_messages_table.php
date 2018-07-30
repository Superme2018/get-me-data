<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_messages', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            $table->string('title');
            $table->string('body');
            $table->bool('active');

             // Relation Key.
            $table->unsignedInteger('member_id');

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_messages');
    }
}
