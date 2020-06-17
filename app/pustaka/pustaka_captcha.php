<?php

/**
 * 
 */
class pustaka_captcha
{
	private $operand1;
	private $operand2;
	private $operator;

	function inisial()
	{
		$this->operand1 = rand(0, 20);
		$this->operand2 = rand(0, 20);
		$this->operator = '+';
	}

	function hasilrumus($a, $b)
	{
		$hasil = $a + $b;
		return $hasil;
	}

	function tampilkanrumus()
	{
		$this->inisial();
		$baru = array(
			'a' => $this->operand1,
			'b' => $this->operand2,
			'o' => $this->operator,
			'h' => $this->hasilrumus($this->operand1, $this->operand2)
		);

		return $baru;
	}
}