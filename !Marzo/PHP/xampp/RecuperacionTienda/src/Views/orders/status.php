<?php

namespace App\Models;

class Status
{
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const COMPLETED = 'completed';
    const CANCELED = 'canceled';

    public static function getAllStatuses()
    {
        return [
            self::PENDING,
            self::PROCESSING,
            self::COMPLETED,
            self::CANCELED
        ];
    }
}
?>