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

    /**
     * @test
     * @dataProvider exampleFractionCases
     */
    function it_divides_fractions(string $dividend, string $divisor, string $expectedQuotient): void
    {
        $quotient = Fraction::fromString($dividend)->dividedBy(Fraction::fromString($divisor));
        self::assertEquals(
            Fraction::fromString($expectedQuotient),
            $quotient,
            "Expected {$dividend} - {$divisor} to equal $expectedQuotient, but got $quotient"
        );
    }

    public function exampleFractionCases()
    {
        return [
            'zero divided by positive fraction' => ['0', '1/5', '0'],
            'positive fraction divided by positive fraction' => ['3/4', '5/8', '6/5'],
            'zero divided by negative fraction' => ['0', '-1/7', '0'],
            'positive fraction divided by negative fraction' => ['7/9', '-1/4', '-28/9'],
            'negative fraction divided by negative fraction' => ['-10/13', '-1/5', '50/13'],
        ];
    }
}