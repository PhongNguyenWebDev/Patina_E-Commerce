<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('blog_id');
            $table->text('content');
            $table->integer('left')->default(0);
            $table->integer('right')->default(0);
            $table->timestamps();

            // Thiết lập khóa ngoại cho parent_id (mối quan hệ đệ quy)
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');

            // Thiết lập khóa ngoại cho user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Thiết lập khóa ngoại cho post_id
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
