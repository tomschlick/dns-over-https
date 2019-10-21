<?php

declare(strict_types=1);

namespace TomSchlick\DoH;

use BenSampo\Enum\Enum;

class StatusType extends Enum
{
    public const NO_ERROR = 0;
    public const FORMAT_ERROR = 1;
    public const SERVER_FAILURE = 2;
    public const NON_EXISTANT_DOMAIN = 3;
    public const NOT_IMPLEMENTED = 4;
}
