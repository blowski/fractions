<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\GCDCalculator;
use PHPUnit\Framework\TestCase;

class GCDTest extends TestCase
{
    /**
     * @test
     * @dataProvider getExamples
     */
    function calculates_greatest_common_divisor_of_two_integers(int $first, int $second, int $expectedGCD): void
    {
        self::assertEquals($expectedGCD, GCDCalculator::gcd($first, $second));
    }

    public function getExamples()
    {
        return [
            [0, 0, 0],
            [1, 1, 1],
            [1, 2, 1],
            [8, 18, 2],
            [6, 15, 3],
            [3, 7, 1],
        ];
    }
}