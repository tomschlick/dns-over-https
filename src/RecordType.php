<?php

declare(strict_types=1);

namespace TomSchlick\DoH;

use BenSampo\Enum\Enum;

class RecordType extends Enum
{
    public const A = 1;
    public const AAAA = 28;
    public const CAA = 257;
    public const CNAME = 5;
    public const DS = 43;
    public const KEY = 25;
    public const MX = 15;
    public const NS = 2;
    public const PTR = 12;
    public const SOA = 6;
    public const SRV = 33;
    public const TXT = 16;
}
