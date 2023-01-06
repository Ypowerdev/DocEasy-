<?php

namespace Form\ConsumerProtectionClaim;

class MultiInputs
{
    public $multiInputs = [
        [
            'title' => 'Название модели телефона, цвет, IMEI',
            'inputs' => [
            'phonename' => 'Название модели смартфона (например Realme C35 4/64Gb, RMX3511)',
            'phonecolor' => 'Цвет',
            'IMEI' => 'IMEI', 
            ]
        ],
    ];

    public function printMultiInputs()
    {
      foreach($this->multiInputs as $input) {
        $this->printMultiInput($input['title'], $input['inputs']);  
      }
    }
  
    private function printMultiInput(string $title, array $inputs)
    {
      echo '<div class="mb-3">';
        echo '<label for="exampleInputPassword1" class="form-label">'. $title .'</label>';
        foreach($inputs as $name => $placeholder) {
          echo '<input name="'.$name.'" type="text" placeholder="'.$placeholder.'" class="form-control" id="exampleInputPassword1">';
        }
      echo '</div>';
    }
}