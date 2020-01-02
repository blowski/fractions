<?php
declare(strict_types=1);

namespace Blowski\Fractions\Tests;

use Blowski\Fractions\Fraction;
use PHPUnit\Framework\TestCase;

class FractionFromStringTest extends TestCase
{
    /**
     * @test
     * @dataProvider validExamples
     */
    function it_converts_strings_to_fraction_objects(string $fractionAsString, Fraction $expectedFraction): void
    {
        self::assertEquals(Fraction::fromString($fractionAsString), $expectedFraction);
    }

    public function validExamples()
    {
        return [
            ['1', new Fraction(1, 1)],
            ['1/1', new Fraction(1, 1)],
            ['1/2', new Fraction(1, 2)],
            ['2/2', new Fraction(1, 1)],
            ['-3/4', new Fraction(-3, 4)],
            ['4/-5', new Fraction(4, -5)],
            ['0', new Fraction(0, 1)],
            ['0/1', new Fraction(0, 1)],
            ['7/6', new Fraction(7, 6)],
        ];
    }


}