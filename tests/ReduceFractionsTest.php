<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class ReduceFractionsTest extends TestCase
{
    /** @test */
    function no_reduction_possible(): void
    {
        self::assertEquals(new Fraction(1, 2), new Fraction(1, 2));
    }

    /** @test */
    function reduces_where_possible(): void
    {
        self::assertEquals(new Fraction(1, 2), new Fraction(3, 6));
    }
}