<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text("comment_content")->comment("content of a comment.");
            $table->timestamp("comment_date")->comment("date when comment was posted.");
            $table->string("reviewer_name")->comment("name of the reviewer")->nullable();
            $table->string("reviewer_email")->comment("email of the reviewer")->nullable();
            $table->boolean("is_hidden")->comment("flag if post is hidden.")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
