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
        // Creating Link Tables
        if (Schema::hasTable('post_category')) {
            return;
        }
        if (Schema::hasTable('post_tag')) {
            return;
        }
        if (Schema::hasTable('user_role')) {
            return;
        }
        Schema::create('post_category', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreign("category_id")->references("id")->on("categories");
        });
        Schema::create('post_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreign("tag_id")->references("id")->on("tags");
        });
        Schema::create('user_role', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("role_id")->references("id")->on("roles");
        });

        // Updating table for foreign keys
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger("post_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("parent_comment_id")->nullable();
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("parent_comment_id")->references("id")->on("comments");
        });
        Schema::table('media', function (Blueprint $table) {
            $table->unsignedBigInteger("post_id");
            $table->foreign("post_id")->references("id")->on("posts");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_category');
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('user_role');
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
        Schema::table('comments', function (Blueprint $table) {
            if (Schema::hasColumn('comments', 'post_id')) {
                $table->dropForeign(['post_id']);
                $table->dropColumn('post_id');
            }
            if (Schema::hasColumn('comments', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('comments', 'parent_comment_id')) {
                $table->dropForeign(['parent_comment_id']);
                $table->dropColumn('parent_comment_id');
            }
        });
        Schema::table('media', function (Blueprint $table) {
            if (Schema::hasColumn('media', 'post_id')) {
                $table->dropForeign(['post_id']);
                $table->dropColumn('post_id');
            }
        });
    }
};
