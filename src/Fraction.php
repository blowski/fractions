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
        $sign = ($denominator / $gcd) > 0 ? 1 : -1;
        $this->numerator = $numerator / $gcd * $sign;
        $this->denominator = $denominator / $gcd * $sign;
    }

    public function __toString()
    {
        if($this->denominator === 1) {
            return (string) $this->numerator;
        } else {
            return sprintf('%d/%d', $this->numerator, $this->denominator);
        }
    }

    public static function fromString(string $fractionAsString): self
    {
        if(strpos($fractionAsString, '/')) {
            [$numerator, $denominator] = explode('/', $fractionAsString);
        } else {
            $numerator = $fractionAsString;
            $denominator = 1;
        }

        if(!is_numeric($numerator) || !is_numeric($denominator) || $denominator === '0') {
            throw new \InvalidArgumentException("{$fractionAsString} is not a valid fraction");
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

    public function minus(Fraction $that): Fraction
    {
        return new Fraction(
            ($this->numerator * $that->denominator) - ($that->numerator * $this->denominator),
            $this->denominator * $that->denominator
        );
    }

    public function multiplyBy(Fraction $that): Fraction
    {
        return new Fraction(
            $this->numerator * $that->numerator,
            $this->denominator * $that->denominator
        );
    }

    public function dividedBy(Fraction $that): Fraction
    {
        return $this->multiplyBy(new Fraction($that->denominator, $that->numerator));
    }
}