<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class AddFractionsTest extends TestCase
{
    /** @test */
    function zero_plus_zero_should_equal_zero(): void
    {
        $sum = (new Fraction(0))->plus(new Fraction(0));
        self::assertEquals(new Fraction(0), $sum);
    }
}