<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_copy_id');
            $table->string('status')->comment('loan_requested/return_requested/lend/returned/lost/wasted');
            $table->unsignedBigInteger('loan_request_id')->nullable();
            $table->unsignedBigInteger('return_request_id')->nullable();
            $table->timestamp('lend_at')->nullable()->comment('will be updated when loan request is approved');
            $table->timestamp('loan_expire_at')->nullable()->comment('will be updated when loan request is approved');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_copy_id')->references('id')->on('book_copies');
            $table->foreign('loan_request_id')->references('id')->on('loan_requests');
            $table->foreign('return_request_id')->references('id')->on('return_requests');

            $table->index(['book_copy_id', 'status'], 'book_status');
            $table->index(['loan_expire_at', 'status'], 'expire_status');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_user', function (Blueprint $table) {
            $table->dropForeign('book_user_user_id_foreign');
            $table->dropColumn('user_id');

            $table->dropForeign('book_user_book_copy_id_foreign');
            $table->dropColumn('book_copy_id');

            $table->dropForeign('book_user_loan_request_id_foreign');
            $table->dropColumn('loan_request_id');

            $table->dropForeign('book_user_return_request_id_foreign');
            $table->dropColumn('return_request_id');
        });

        Schema::dropIfExists('book_user');
    }
}
