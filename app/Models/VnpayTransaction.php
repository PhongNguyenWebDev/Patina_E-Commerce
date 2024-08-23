<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VnpayTransaction extends Model
{
    use HasFactory;

    // Tên bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'vnpay_transactions';

    // Các cột có thể được điền (fillable) thông qua cơ chế mass assignment
    protected $fillable = [
        'vnp_TxnRef',
        'vnp_Amount',
        'vnp_BankCode',
        'vnp_BankTranNo',
        'vnp_CardType',
        'vnp_OrderInfo',
        'vnp_PayDate',
        'vnp_ResponseCode',
        'vnp_TmnCode',
        'vnp_TransactionNo',
        'vnp_TransactionStatus',
        'vnp_SecureHash',
    ];
}
