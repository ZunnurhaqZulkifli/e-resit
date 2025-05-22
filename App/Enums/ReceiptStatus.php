<?php

namespace App\Enums;

class ReceiptStatus
{
    const PENDING = 'pending';
    const PAID = 'paid';

    public static function all()
    {
        return [
            self::PENDING,
            self::PAID,
        ];
    }
}