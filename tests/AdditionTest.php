<?php 

use PHPUnit\Framework\TestCase as TCase;


class AdditionTest extends TCase 
{

	/** @test **/

	public function adds_given_operands()
	{
		$calculator = new App\Addition;

		$data = range(0,10);

		$calculator->setOperands($data);

		$this->assertEquals(array_sum($data),$calculator->calculate());
	}

	/** @test **/

	public function throws_exception_when_no_operand_is_given()
	{
		$this->expectException(App\Exceptions\NoOperandsException::class);

		$addition = new App\Addition;

		$addition->calculate();
	}

}