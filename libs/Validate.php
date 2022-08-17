<?php
class Validate
{

	// Error array
	private $errors	= [];

	// Source array
	private $source	= [];

	// Rules array
	private $rules	= [];

	// Result array
	private $result	= [];

	// Contrucst
	public function __construct($source)
	{
		$this->source = $source;
	}

	// Add rules
	public function addRules($rules)
	{
		$this->rules = array_merge($rules, $this->rules);
	}

	// Get error
	public function getError()
	{
		return $this->errors;
	}

	// Set error
	public function setError($element, $message)
	{

		if (array_key_exists($element, $this->errors)) {
			$this->errors[$element] .= ' - ' . $message;
		} else {
			$this->errors[$element] = '<b>' . ucfirst($element) . ':</b> ' . $message;
		}
	}

	// Get result
	public function getResult()
	{
		return $this->result;
	}

	// Add rule
	public function addRule($element, $type, $options = null, $required = true)
	{
		$this->rules[$element] = ['type' => $type, 'options' => $options, 'required' => $required];
		return $this;
	}

	// Run
	public function run()
	{
		foreach ($this->rules as $element => $value) {
			if ($value['required'] == true && trim($this->source[$element]) == null) {
				$this->setError($element, 'is not empty !');
			} else {
				switch ($value['type']) {
					case 'int':
						$this->validateInt($element, $value['options']['min'], $value['options']['max']);
						break;
					case 'string':
						$this->validateString($element, $value['options']['min'], $value['options']['max']);
						break;
					case 'email':
						$this->validateEmail($element, $value['options']);
						break;
					case 'password':
						$this->validateReTypePassword($element, $value['options']);
						break;
				}
			}
			if (!array_key_exists($element, $this->errors)) {
				$this->result[$element] = $this->source[$element];
			}
		}
		$eleNotValidate = array_diff_key($this->source, $this->errors);
		$this->result	= array_merge($this->result, $eleNotValidate);
	}

	// Validate Integer
	private function validateInt($element, $min = 0, $max = 0)
	{
		if (!filter_var($this->source[$element], FILTER_VALIDATE_INT, ["options" => ["min_range" => $min, "max_range" => $max]])) {
			$this->setError($element, 'is an invalid number');
		}
	}


	// Validate String
	private function validateString($element, $min = 0, $max = 0)
	{
		$length = strlen($this->source[$element]);
		if ($length < $min) {
			$this->setError($element, 'is too short. At least ' . $min . ' character');
		} elseif ($length > $max) {
			$this->setError($element, 'is too long. At most ' . $max . ' character');
		} elseif (!is_string($this->source[$element])) {
			$this->setError($element, 'is an invalid string');
		}
	}

	// Validate Email
	private function validateEmail($element, $arrEmail)
	{
		if (!filter_var($this->source[$element], FILTER_VALIDATE_EMAIL)) {
			$this->setError($element, 'is an invalid email');
		}
		
		if(in_array($this->source[$element], $arrEmail)){
			$this->setError($element, 'already exists');
		}
	}

	private function validateReTypePassword($element, $object){
		if($this->source[$element] !== $object){
			$this->setError($element, 'is not match');
		}
		$this->validateString($element, 5, 50);
		
	}

	public function showErrors()
	{
		$xhtml = '';
		if (!empty($this->errors)) {
			$xhtml .= '<ul class="mb-0">';
			foreach ($this->errors as $value) {
				$xhtml .= '<li>' . $value . ' </li>';
			}
			$xhtml .=  '</ul>';
		}
		return $xhtml;
	}

	public function isValid()
	{
		if (count($this->errors) > 0) return false;
		return true;
	}

}
