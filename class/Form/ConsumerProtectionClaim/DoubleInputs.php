
<?php

namespace Form\ConsumerProtectionClaim;

class DoubleInputs
{
    public $doubleInputs = [
        [
            [
            'title' => 'Дополнительные аксессуары к смартфону',
            'name' => 'accesoriesArrName[]',
            'placeholder' => 'Дополнительные аксессуары (например, защитная плёнка)',
            ],
            [
            'title' => 'Стоимость аксессуара',
            'name' => 'accesoriesArrPrice[]',
            'placeholder' => 0,
            ]
        ],
        [
            [
            'title' => 'Дополнительные аксессуары (например, ПО, антивирус и т.д.)',
            'name' => 'accesoriesArrName[]',
            'placeholder' => 'Дополнительные аксессуары (например, защитная плёнка)',
            ],
            [
            'title' => 'Стоимость аксессуара',
            'name' => 'accesoriesArrPrice[]',
            'placeholder' => 0,
            ]
        ],
    ];

    public function printDoubleInputs()
    {
      foreach($this->doubleInputs as $inputs) {
        $this->printDoubleInput($inputs);
      }
    }
  
    private function printDoubleInput($inputs)
    {
      echo '<div class="mb-3">';
        foreach($inputs as $input) {
          echo '<label for="exampleInputPassword1" class="form-label">'.$input['title'].'</label>';
          echo '<input name="'.$input['name'].'" type="text" placeholder="'.$input['placeholder'].'" class="form-control" id="exampleInputPassword1">';
        }
      echo '</div>';
    }
}
