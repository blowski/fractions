<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use PHPUnit\Framework\TestCase;

class GCDTest extends TestCase
{
    /**
     * @test
     * @dataProvider getExamples
     */
    function calculates_greatest_common_divisor_of_two_integers(int $first, int $second, int $expectedGCD): void
    {
        self::assertEquals($expectedGCD, $this->gcd($first, $second));
    }

    public function gcd(int $a, int $b): int
    {
        while($b !== 0) {
            $t = $b;
            $b = $a % $b;
            $a = $t;
        }
        return $a;
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