<?php 

namespace App;

use App\Interfaces\OperationInterface;

use App\Exceptions\NoOperandsException;
use App\OperationAbstract;

class Addition extends OperationAbstract implements OperationInterface
{

	public function calculate()
	{
		
		if (empty($this->operands) || count($this->operands) == 0) {
			throw new NoOperandsException;
			
		}	
		return array_sum($this->operands);
	}
}