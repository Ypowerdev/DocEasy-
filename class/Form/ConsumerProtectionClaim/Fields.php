<?php

namespace Form\ConsumerProtectionClaim;

class Fields
{
    public $fields = [
        [
          'title' => 'Наименование организации (продавца, импортёра, производителя)',
          'placeholder' => 'ООО Вектор',
          'name' => 'companyName',
        ],
        [
          'title' => 'Юридический адрес организации',
          'placeholder' => 'Лахтинский проспект, д. 2, корп. 3, стр. 1, Санкт-Петербург, 197229',
          'name' => 'companyAdress',
        ],
        [
          'title' => 'ФИО потребителя',
          'placeholder' => 'Иванова Ивана Ивановича',
          'name' => 'claimantName',
        ],
        [
          'title' => 'Адрес регистрации потребителя (прописки)',
          'placeholder' => '115580, ул. Мусы Джалиля, д. 5-1, кв. 96',
          'name' => 'claimantAdress',
        ],
        [
          'title' => 'Наименование магазина продавца (импортёра, производителя)',
          'placeholder' => 'Название магазина (например, ДНС, М-Видео и т.д.)',
          'name' => 'shopName',
        ],
        [
          'title' => 'Цена смартфона',
          'placeholder' => '0',
          'name' => 'phonePrice',
        ],
        [
          'title' => 'Гарантийный срок',
          'placeholder' => '0',
          'name' => 'warrantyTerm',
        ],
        [
          'title' => 'Описание недостатка',
          'placeholder' => 'Например, выключается экран, не работает камера и т.д.',
          'name' => 'flawDescription',
        ]
      ];

      public function printInputs()
      {
        foreach($this->fields as $field) {
          $this->printInput($field['title'], $field['placeholder'], $field['name']);  
        }
      }
    
      public function printInput(string $title, string $placeholder, string $name) {
        echo '<div class="mb-3">';
          echo '<label for="exampleInputEmail1" class="form-label">'.$title.'</label>';
          echo '<input name="'.$name.'" type="text" placeholder="'.$placeholder.'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">';
        echo '</div>';
      }
}