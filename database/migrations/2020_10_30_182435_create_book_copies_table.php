<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BookCopy;

class CreateBookCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_copies', function (Blueprint $table) {
            $table->id();
            $table->integer('uuid')->unique();
            $table->unsignedBigInteger('book_id');
            $table->string('edition')->nullable();
            $table->string('condition')->default(BookCopy::CONDITION_NEW)->comment('new/old');
            $table->string('description')->nullable();
            $table->dateTime('published_date')->nullable();
            $table->boolean('is_available')->default(true);
            $table->unsignedBigInteger('added_by');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('added_by')->references('id')->on('users')->comment('librarian id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_copies', function (Blueprint $table) {
            $table->dropForeign('book_copies_book_id_foreign');
            $table->dropColumn('book_id');

            $table->dropForeign('book_copies_added_by_id_foreign');
            $table->dropColumn('added_by');
        });
        Schema::dropIfExists('book_copies');
    }
}
