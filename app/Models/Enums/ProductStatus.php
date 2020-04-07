<?php

namespace App\Models\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ACTIVE()
 * @method static static INACTIVE()
 */
final class ProductStatus extends Enum
{
    const ACTIVE =   1;
    const INACTIVE =   0;
}
