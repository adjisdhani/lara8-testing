<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\Calculator;

class CalculatorTest extends TestCase
{
    protected $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }

    /** @test */
    public function it_can_add_two_numbers()
    {
        $result = $this->calculator->add(5, 3);
        $this->assertEquals(8, $result);
    }

    /** @test */
    public function it_can_subtract_two_numbers()
    {
        $result = $this->calculator->subtract(5, 3);
        $this->assertEquals(2, $result);
    }

    /** @test */
    public function it_can_multiply_two_numbers()
    {
        $result = $this->calculator->multiply(5, 3);
        $this->assertEquals(15, $result);
    }

    /** @test */
    public function it_can_divide_two_numbers()
    {
        $result = $this->calculator->divide(6, 3);
        $this->assertEquals(2, $result);
    }

    /** @test */
    public function it_throws_an_exception_when_dividing_by_zero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calculator->divide(6, 0);
    }
}
