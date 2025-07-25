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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title")->comment("title of a post.");
            $table->text("content")->comment("content of the post.");
            $table->string("slug")->comment("unique url identifier of the post.");
            $table->timestamp("publication_date")->comment("date of publication.")->nullable();
            $table->timestamp("last_modified_date")->comment("date of last modification of a post.")->nullable();
            $table->string("status")->comment("D - Draft, P - Published, I - Inactive")->max(1);
            $table->text("featured_image_url")->comment("main photo of the post.");
            $table->integer("views_count")->comment("total view count of the post.")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
