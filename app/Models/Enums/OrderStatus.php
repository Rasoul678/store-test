<?php

namespace App\Models\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static COMPLETED()
 * @method static static CANCELLED()
 */
final class OrderStatus extends Enum
{
    const PENDING =   0;
    const COMPLETED =   1;
    const CANCELLED = 2;
}
