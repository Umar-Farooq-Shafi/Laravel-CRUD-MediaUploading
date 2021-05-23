<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Title length is 100 constraints
            $table->string('title', 100);
            $table->string('created_by');
            $table->text('description');
            // The column for student email as said
            $table->string('st_email')->default('70070341@student.uol.edu.pk');
            // Default value of is_active true constraints
            $table->boolean('is_active')->default(true);
            // Name of file uploaded
            $table->string('name');
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
        Schema::dropIfExists('posts');
    }
}
