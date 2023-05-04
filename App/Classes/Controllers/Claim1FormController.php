<?php

namespace App\Classes\Controllers;

use App\View\View; 

class Claim1FormController
{
	private View $view; 
		
	public function __construct()
	{		
		$this->view = new View(APPLICATION_PATH . '/templates'); 
	}
	
	public function printForm(): void
	{

		$doubleInputs = [
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

		$fields = [
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
			  'placeholder' => 0,
			  'name' => 'phonePrice',
			],
			[
			  'title' => 'Гарантийный срок',
			  'placeholder' => 0,
			  'name' => 'warrantyTerm',
			],
			[
			  'title' => 'Описание недостатка',
			  'placeholder' => 'Например, выключается экран, не работает камера и т.д.',
			  'name' => 'flawDescription',
			]
		  ];

		$multiInputs = [
		[
			'title' => 'Название модели телефона, цвет, IMEI',
			'inputs' => [
			'phoneName' => 'Название модели смартфона (например Realme C35 4/64Gb, RMX3511)',
			'phoneColor' => 'Цвет',
			'imei' => 'IMEI', 
			]
		],
		];

		$selectors = [
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
	
      	$months = [
			'января',
			'февраля',
			'марта',
			'апреля',
			'мая',
			'июня',
			'июля',
			'августа',
			'сентября',
			'октября',
			'ноября',
			'декабря'];
			
	$this->view->renderHtml('claim1/claim1.php', 
	[
		'doubleInputs' => $doubleInputs,
		'fields' => $fields,
		'multiInputs' => $multiInputs,
		'selectors' => $selectors,
		'months' => $months
	]);	

	}
}
    