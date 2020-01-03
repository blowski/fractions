<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class SubtractFractionsTest extends TestCase
{
    /**
     * @test
     * @dataProvider exampleIntegerCases
     */
    function integers(int $minuend, int $subtrahend, int $expectedResult): void
    {
        $difference = (new Fraction($minuend))->minus(new Fraction($subtrahend));
        self::assertEquals(
            new Fraction($expectedResult),
            $difference,
            "Expected {$minuend} - {$subtrahend} to equal $expectedResult, but got $difference"
        );
    }

    public function exampleIntegerCases()
    {
        return [
            'zero minus zero' => [0, 0, 0],
            'positive non-zero minus zero' => [4, 0, 4],
            'zero minus positive non-zero' => [0, 7, -7],
            'positive non-zero minus positive non-zero' => [6, 5, 1],
            'bigger negative minus smaller positive' => [-9, 3, -12],
            'smaller negative minus bigger positive' => [-3, 7, -10],
            'subtracting a negative number' => [5, -3, 8],
            'max int minus 1' => [PHP_INT_MAX, 1, PHP_INT_MAX - 1],
            'max int minus zero' => [PHP_INT_MAX, 0, PHP_INT_MAX],
            'nearly min int minus 1' => [PHP_INT_MIN  + 1, 1, PHP_INT_MIN],
        ];
    }

    /**
     * @test
     * @dataProvider exampleFractionCases
     */
    function fractions(string $minuend, string $subtrahend, string $expectedResult): void
    {
        $difference = Fraction::fromString($minuend)->minus(Fraction::fromString($subtrahend));
        self::assertEquals(
            Fraction::fromString($expectedResult),
            $difference,
            "Expected {$minuend} - {$subtrahend} to equal $expectedResult, but got $difference"
        );
    }

    public function exampleFractionCases()
    {
        return [
            ['4/5', '3/5', '1/5'],
            ['9/7', '4/7', '5/7'],
            ['3/4', '1/8', '5/8'],
            ['12/7', '1', '5/7'],
            ['-1/2', '3/4', '-5/4'],
            ['-9/10', '0', '-9/10'],
            ['0', '19/20', '-19/20'],
            ['0', '-5/6', '5/6'],
            ['3', '2/3', '7/3'],
            ['1', '17/8', '-9/8'],
            ['7/12', '-4/12', '11/12'],
        ];
    }
}