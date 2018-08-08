<?php 

use PHPUnit\Framework\TestCase as TCase;


class CalculatorTest extends TCase 
{

	/** @test **/

	public function can_set_single_operation()
	{
		$addition = new App\Addition;
		$addition->setOperands([10,2]);

		$calculator = new App\Calculator;
		$calculator->setOperantion($addition);

		$this->assertCount(1,$calculator->getOperations());
	}	

	/** @test **/

	public function can_set_multiple_operations()
	{
		$addition1 = new App\Addition;
		$addition1->setOperands([10,2]);
	
		$addition2 = new App\Addition;
		$addition2->setOperands([200,5]);

		$calculator = new App\Calculator;
		$calculator->setOperantions([$addition1,$addition2]);
	
		$this->assertCount(2,$calculator->getOperations());
	}

	/** @test **/

	public function operations_are_ignored_if_not_instance_of_operation_interface()
	{
		$addition = new App\Addition;
		$addition->setOperands([200,5]);

		$calculator = new App\Calculator;
		$calculator->setOperantions([$addition,'cats','doggie']);
		
		$this->assertCount(1,$calculator->getOperations());
		
	}

	/** @test **/

	public function can_calculate_result()
	{
		$addition = new App\Addition;
		$addition->setOperands([200,5]);

		$calculator = new App\Calculator;
		$calculator->setOperantion($addition);
	
		$this->assertEquals(205,$calculator->calculate());	
	} 

	/** @test **/

	public function calculate_returns_multiple_results()
	{
		$addition = new App\Addition;
		$addition->setOperands([10,2]); // 12
		
		$division = new App\Division;
		$division->setOperands([100,5]); // 20
		

		$calculator = new App\Calculator;
		$calculator->setOperantions([$addition,$division]);

		$this->assertInternalType('array',$calculator->calculate());

		$this->assertEquals(12,$calculator->calculate()[0]);
		$this->assertEquals(20,$calculator->calculate()[1]);

	}	
}