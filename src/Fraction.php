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

    public static function fromString(string $fractionAsString): self
    {
        if(strpos($fractionAsString, '/')) {
            [$numerator, $denominator] = explode('/', $fractionAsString);
        } else {
            $numerator = $fractionAsString;
            $denominator = 1;
        }
        return new self((int) $numerator, (int) $denominator);

    }

    public function plus(Fraction $that): Fraction
    {
        return new Fraction(
            ($this->numerator * $that->denominator) + ($that->numerator * $this->denominator),
            $this->denominator * $that->denominator
        );
    }
}