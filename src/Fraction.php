<?php
declare(strict_types=1);

namespace Blowski\Fractions;

final class Fraction
{
    private int $intValue;

    public function __construct(int $intValue)
    {
        $this->intValue = $intValue;
    }

    public function plus(Fraction $that): Fraction
    {
        return new Fraction($this->intValue + $that->intValue);
    }
}