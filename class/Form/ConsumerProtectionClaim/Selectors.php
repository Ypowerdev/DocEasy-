<?php

namespace Form\ConsumerProtectionClaim;

use \Date;

class Selectors
{
	public function __construct()
	{
		$date = new Date();
		$this->firstYear = $date->firstYear;
		$this->lastYear = $date->lastYear;
		$this->months = $date->months;
	}

	public $selectors = [
		[
			'title' => 'Дата приобретения товара',
			'day' => 'date',
			'month' => 'month',
			'year' => 'year',
		],
		[
			'title' => 'Дата чека (документа о продаже товара)',
			'day' => 'docDate',
			'month' => 'docMonth',
			'year' => 'docYear',
		],
		[
			'title' => 'Дата составления претензии',
			'day' => 'claimDate',
			'month' => 'claimMonth',
			'year' => 'claimYear',
		]
	];

	public function printSelectors()
	{
		foreach($this->selectors as $selector) {
			$this->printSelector($selector['title'], $selector['day'], $selector['month'], $selector['year']);  
		}
	}

	private function printSelector($title, $day, $month, $year) 
	{
		echo '<div class="mb-3">';
			echo '<label for="exampleInputPassword1" class="form-label">'. $title .'</label>';
			echo '<select name="'. $day .'">';
			for($i= 1; $i<= 31; $i++):  
				echo '<option>'. $i .'</option>';
			endfor;
			echo '</select>';

			echo '<select name="'. $month .'">';
			foreach($this->months as $month):   
				echo '<option>'. $month .'</option>';
			endforeach;
			echo '</select>';

			echo '<select name="'. $year .'">';
			for($i = $this->firstYear; $i <= $this->lastYear; $i++):  
				echo '<option>'. $i .'</option>';
			endfor;
			echo '</select>';
		echo '</div>';
	} 
}