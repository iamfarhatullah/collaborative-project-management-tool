<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id'); // Foreign Key to Task
            $table->unsignedBigInteger('user_id'); // Foreign Key to User
            $table->string('message'); // Notification message
            $table->boolean('is_read')->default(false); // Mark as read or unread
            $table->timestamps();

            // Foreign Keys
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
