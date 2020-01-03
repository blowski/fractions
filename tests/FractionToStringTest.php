<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class FractionToStringTest extends TestCase
{
    /** @test */
    function normal_fraction(): void
    {
        self::assertEquals('4/5', (string) new Fraction(4, 5));
    }

    /** @test */
    function shows_reduced_fractions(): void
    {
        self::assertEquals('1/2', (string) new Fraction(3, 6));
    }

    /** @test */
    function negative_denominator(): void
    {
        self::assertEquals('1/-2', (string) new Fraction(1, -2));
    }

    /** @test */
    function negative_numerator(): void
    {
        self::assertEquals('-1/2', (string) new Fraction(-1, 2));
    }

    /** @test */
    function integers_dont_have_a_denominator(): void
    {
        self::assertEquals('5', (string) new Fraction(5, 1));
        self::assertEquals('8', (string) new Fraction(8));
    }
}