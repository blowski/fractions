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

    /**
     * @test
     * @dataProvider fractionExampleCases
     */
    function it_multiplies_fractions(string $multiplicand, string $multiplier, string $expectedProduct): void
    {
        self::assertEquals(
            Fraction::fromString($expectedProduct),
            Fraction::fromString($multiplicand)->multiplyBy(Fraction::fromString($multiplier))
        );
    }

    function fractionExampleCases(): array
    {
        return [
            'same denominators' => ['1/5', '2/5', '2/25'],
            'different denominators' => ['1/6', '1/5', '1/30'],
            'negative numerator on multiplicand' => ['-7/8', '3/8', '-21/64'],
            'negative numerator on multiplier' => ['-7/8', '3/8', '-21/64'],
            'both multiplicand and multiplier numerators are negative' => ['-3/5', '-4/5', '12/25'],
            'zero numerator on multiplicand' => ['0/11', '1/11', '0'],
            'zero numerator on multiplier' => ['1/14', '0/14', '0'],
            'both multiplicand and multiplier are zero' => ['0/13', '0/13', '0'],
            'negative denominator on multiplicand' => ['15/-16', '3/16', '45/-256'],
            'negative denominator on multiplier' => ['12/17', '3/-17', '36/-289'],
            'both multiplicand and multiplier denominators are negative' => ['5/-18', '7/-18', '35/324'],
            'multiplicand is 1' => ['1', '3/17', '3/17'],
            'multiplier is 1' => ['11/24', '1', '11/24'],
            'multiplicand is an integer bigger than 1' => ['4', '3/29', '12/29'],
            'multiplier is an integer bigger than 1' => ['4/31', '1', '4/31'],
            'multiplicand is a fraction bigger than 1' => ['18/13', '2/3', '36/39'],
            'multiplier is a fraction bigger than 1' => ['1/35', '103/4', '103/140'],
            'product is a fraction bigger than 1' => ['9/10', '103/7', '927/70'],
            'both multiplier and multiplicand are fractions bigger than 1' => ['14/13', '16/15', '224/195'],
            'product can be reduced' => ['11/2', '4', '88/4']
        ];
    }


}