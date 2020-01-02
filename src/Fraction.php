<?php
declare(strict_types=1);

namespace Blowski\Fractions;

final class Fraction
{
    private int $numerator;
    private int $denominator;

    public function __construct(int $numerator, int $denominator = 1)
    {
        $gcd = GCDCalculator::gcd($numerator, $denominator);
        $this->numerator = $numerator / $gcd;
        $this->denominator = $denominator / $gcd;

    }

    public function plus(Fraction $that): Fraction
    {
        if($this->denominator === 1 || $this->denominator === $that->denominator) {
            return new Fraction($this->numerator + $that->numerator, $that->denominator);
        }

        return new Fraction(
            ($this->numerator * $that->denominator) + ($that->numerator * $this->denominator),
            $this->denominator * $that->denominator
        );
    }
}