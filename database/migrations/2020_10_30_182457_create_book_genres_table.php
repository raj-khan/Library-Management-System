<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genres', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('genre_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_genres', function (Blueprint $table) {
            $table->dropForeign('book_genres_book_id_foreign');
            $table->dropColumn('book_id');

            $table->dropForeign('book_genres_genre_id_foreign');
            $table->dropColumn('genre_id');
        });
        Schema::dropIfExists('book_genres');
    }
}
