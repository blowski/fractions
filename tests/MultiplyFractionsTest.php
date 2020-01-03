<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class MultiplyFractionsTest extends TestCase
{
    /**
     * @test
     * @dataProvider integerExampleCases
     */
    function it_multiplies_integers(int $multiplicand, int $multiplier, int $expectedProduct): void
    {
        self::assertEquals(new Fraction($expectedProduct), (new Fraction($multiplicand))->multiplyBy(new Fraction($multiplier)));
    }

    public function integerExampleCases(): array
    {
        return [
            'zero times zero' => [0, 0, 0],
            'positive non-zero times zero' => [4, 0, 0],
            'zero times positive non-zero' => [0, 7, 0],
            'positive non-zero times positive non-zero' => [5, 6, 30],
            'negative times positive' => [-9, 3, -27],
            'positive times negative' => [-3, 7, -21],
            'negative times negative' => [-8, -5, 40],
        ];
    }


}