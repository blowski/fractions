<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class EqualityTest extends TestCase
{
    /** @test */
    function integer_compared_to_fraction_where_denominator_is_1(): void
    {
        self::assertEquals(
            new Fraction(12, 1),
            new Fraction(12)
        );
    }

    /** @test */
    function reduced_fraction_equal_to_unreduced_fraction(): void
    {
        self::assertEquals(
            new Fraction(4, 12),
            new Fraction(1, 3)
        );
    }

}