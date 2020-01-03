<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class DivideFractionsTest extends TestCase
{
    /**
     * @test
     * @dataProvider integerExampleCases
     */
    function it_divides_integers(int $dividend, int $divisor, int $expectedQuotient): void
    {
        self::assertEquals(new Fraction($expectedQuotient), (new Fraction($dividend))->dividedBy(new Fraction($divisor)));
    }

    public function integerExampleCases(): array
    {
        return [
            'zero divided by positive non-zero' => [0, 7, 0],
            'positive non-zero divided by positive non-zero' => [6, 3, 2],
            'negative divided by positive' => [-27, 3, -9],
            'positive divided by negative' => [24, -6, -4],
            'negative divided by negative' => [-8, -4, 2],
        ];
    }
}