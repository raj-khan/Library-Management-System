<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_users', function (Blueprint $table) {
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
        Schema::dropIfExists('book_users');
    }
}
