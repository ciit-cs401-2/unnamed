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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string("file_name")->comment("name of the file uploaded.");
            $table->string("file_type")->comment("file type of the file uploaded.")->max(10);
            $table->integer("file_size")->comment("size of the file.")->default(0);
            $table->text("url")->comment("location of the file uploaded.");
            $table->timestamp("upload_date")->comment("date file was uploaded.");
            $table->string("description")->comment("file description.")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
