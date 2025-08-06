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

            $table->text("comment_content")->comment("Content of the comment");
            $table->timestamp("comment_date")->comment("Date when the comment was posted");
            $table->string("reviewer_name")->nullable()->comment("Name of the guest reviewer");
            $table->string("reviewer_email")->nullable()->comment("Email of the guest reviewer");
            $table->boolean("is_hidden")->default(false)->comment("Flag if comment is hidden");

            // 🔗 Relationships
            $table->foreignId("post_id")
                ->constrained()
                ->onDelete("cascade")
                ->comment("Post the comment belongs to");

            $table->foreignId("user_id")
                ->nullable()
                ->constrained()
                ->onDelete("set null")
                ->comment("User who wrote the comment");

            $table->foreignId("parent_comment_id")
                ->nullable()
                ->constrained("comments")
                ->onDelete("cascade")
                ->comment("If this is a reply, the parent comment ID");
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
