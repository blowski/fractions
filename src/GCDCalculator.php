<?php
declare(strict_types=1);

namespace Blowski\Fractions;

final class GCDCalculator
{
    public static function gcd(int $a, int $b): int
    {
        while($b !== 0) {
            $t = $b;
            $b = $a % $b;
            $a = $t;
        }
        return $a;
    }
}