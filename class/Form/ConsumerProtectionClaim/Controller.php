<?php

namespace Form\ConsumerProtectionClaim;

class Controller
{
	public Fields $fields;
	public Selectors $selectors;
	public MultiInputs $multiInputs;
	public DoubleInputs $doubleInputs;

	public function __construct()
	{
		$this->fields = new Fields();
		$this->multiInputs = new MultiInputs();
		$this->doubleInputs = new DoubleInputs();
		$this->selectors = new Selectors();

		$this->printForm();
	}

	public function printForm()
	{
		echo '<div style="width:45%; text-align: center; margin: auto;">';
			echo '<form method="post" action="/doc/consumer-protection-claim">';

				$this->fields->printInputs(); 
				$this->multiInputs->printMultiInputs();
				$this->doubleInputs->printDoubleInputs();
				$this->selectors->printSelectors(); 

			echo '<button type="submit" class="btn btn-primary">Отправить</button>';
			echo '</form>';
		echo '</div>';
	}
}
    