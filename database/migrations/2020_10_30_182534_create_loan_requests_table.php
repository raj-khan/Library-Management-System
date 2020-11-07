<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LoanRequest;

class CreateLoanRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default(LoanRequest::CONDITION_PENDING)->comment('approved/rejected/pending');
            $table->integer('status_changed_by');
            $table->string('reason')->nullable()->comment('If rejected, a reason should be provided');
            $table->timestamp('status_change_date')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            $table->dropForeign('loan_requests_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('loan_requests');
    }
}
