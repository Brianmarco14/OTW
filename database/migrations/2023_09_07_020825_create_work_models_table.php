<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('writter');
            $table->bigInteger('reader')->default(0);
            $table->date('release_date');
            $table->text('description');
            $table->boolean('is_verified')->default(0);
            $table->string('m_genre_id');
            $table->string('m_category_id');
            $table->string('page_id');
            $table->string('playlist_id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->integer('deleted_by')->default(0);
            
            $table->index('title');
            $table->index('writter');
            $table->index('m_genre_id');
            $table->index('m_category_id');
            $table->index('page_id');
            $table->index('playlist_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work');
    }
};
