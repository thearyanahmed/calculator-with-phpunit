<?php 

use PHPUnit\Framework\TestCase as TCase;


class DivisionTest extends TCase 
{

	/** @test **/

	public function adds_given_operands()
	{
		$calculator = new App\Division;

		$data = [10,2];

		$calculator->setOperands($data);

		$this->assertEquals(5,$calculator->calculate());
	}

	/** @test **/

	public function throws_expection_when_no_operand_is_given()
	{
		$this->expectException(App\Exceptions\NoOperandsException::class);

		$division = new App\Division;

		$division->calculate();
	}

	/** @test **/

	public function ignores_division_by_zero_operands()
	{
		$division = new App\Division;

		$division->setOperands([100,0,0,05,5,0]);

		$this->assertEquals(4,$division->calculate());
	}

}