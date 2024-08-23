<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVnpayTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('vnpay_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('vnp_TxnRef')->unique(); // Mã giao dịch từ VNPAY
            $table->integer('vnp_Amount');
            $table->string('vnp_BankCode');
            $table->string('vnp_BankTranNo')->nullable();
            $table->string('vnp_CardType')->nullable();
            $table->text('vnp_OrderInfo')->nullable();
            $table->string('vnp_PayDate');
            $table->string('vnp_ResponseCode');
            $table->string('vnp_TmnCode');
            $table->string('vnp_TransactionNo')->nullable();
            $table->string('vnp_TransactionStatus');
            $table->text('vnp_SecureHash');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vnpay_transactions');
    }
}
