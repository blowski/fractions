<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class AddFractionsTest extends TestCase
{
    /**
     * @test
     * @dataProvider exampleIntegerCases
     */
    function integers(int $augend, int $addend, int $expectedResult): void
    {
        $sum = (new Fraction($augend))->plus(new Fraction($addend));
        self::assertEquals(new Fraction($expectedResult), $sum);
    }

    public function exampleIntegerCases()
    {
        return [
            'zero plus zero' => [0, 0, 0],
            'positive non-zero plus zero' => [4, 0, 4],
            'zero plus positive non-zero' => [0, 7, 7],
            'positive non-zero plus positive non-zero' => [5, 6, 11],
            'bigger negative plus smaller positive' => [-9, 3, -6],
            'smaller negative plus bigger positive' => [-3, 7, 4],
            'nearly max int plus 1' => [PHP_INT_MAX - 1, 1, PHP_INT_MAX],
            '1 plus nearly max int' => [1, PHP_INT_MAX - 1, PHP_INT_MAX],
            'max int plus zero' => [PHP_INT_MAX, 0, PHP_INT_MAX],
            'zero plus max int' => [0, PHP_INT_MAX, PHP_INT_MAX],
            'min int plus 1' => [PHP_INT_MIN, 1, PHP_INT_MIN + 1],
            '1 plus min int' => [1, PHP_INT_MIN, PHP_INT_MIN + 1],
        ];
    }

    /** @test */
    function same_denominators(): void
    {
        $sum = (new Fraction(1, 5))->plus(new Fraction(2, 5));
        self::assertEquals(new Fraction(3, 5), $sum);
    }

    /** @test */
    function different_denominators(): void
    {
        $sum = (new Fraction(1, 6))->plus(new Fraction(1, 5));
        self::assertEquals(new Fraction(11, 30), $sum);
    }
}