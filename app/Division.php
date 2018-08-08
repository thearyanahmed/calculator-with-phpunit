<?php 

namespace App;

use App\Interfaces\OperationInterface;

use App\Exceptions\NoOperandsException;
use App\OperationAbstract;

class Division extends OperationAbstract implements OperationInterface
{

	public function calculate()
	{
		
		if (empty($this->operands) || count($this->operands) == 0) {
			throw new NoOperandsException;
			
		}	

		return array_reduce(array_filter($this->operands), function($a,$b){
			
			if($a !== null && $b !== null) {
				return $a / $b;
			}

			return $b;
		},null);
	}
}