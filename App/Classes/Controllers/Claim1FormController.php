<?php

namespace App\Classes\Controllers;

use App\View\View; 
use App\ViewHelper\SelectorsFormBuilder; 
use App\ViewHelper\MultiFormBuilder; 
use App\ViewHelper\SimpleFormBuilder; 
use App\ViewHelper\DataFormBuilder; 

class Claim1FormController
{
    private View $view; 
			
	public function __construct()
	{		
		$this->view = new View(APPLICATION_PATH . '/templates'); 
	}
	
	public function printForm(): void
	{
		$doubleInputs = [[]]; 

		$simpleFormBuilder = new SimpleFormBuilder(); 

		$simpleFormBuilder->withTitle('Дополнительные аксессуары к смартфону'); 
		$simpleFormBuilder->withName('accesoriesArrName[]'); 
		$simpleFormBuilder->withPlaceHolder('Дополнительные аксессуары (например, защитная плёнка)'); 
		$doubleInputs[0][] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Стоимость аксессуара'); 
		$simpleFormBuilder->withName('accesoriesArrPrice[]'); 
		$simpleFormBuilder->withPlaceHolder(0); 
		$doubleInputs[0][] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Дополнительные аксессуары (например, ПО, антивирус и т.д.)'); 
		$simpleFormBuilder->withName('accesoriesArrName[]'); 
		$simpleFormBuilder->withPlaceHolder('Дополнительные аксессуары (например, защитная плёнка)'); 
		$doubleInputs[1][] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Стоимость аксессуара'); 
		$simpleFormBuilder->withName('accesoriesArrPrice[]'); 
		$simpleFormBuilder->withPlaceHolder(0); 
		$doubleInputs[1][] = $simpleFormBuilder->buildSimpleBlock(); 

		$fields = []; 

		$simpleFormBuilder->withTitle('Наименование организации (продавца, импортёра, производителя)'); 
		$simpleFormBuilder->withName('companyName'); 
		$simpleFormBuilder->withPlaceHolder('ООО "Вектор"'); 
		$fields[] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Юридический адрес организации'); 
		$simpleFormBuilder->withName('companyAdress'); 
		$simpleFormBuilder->withPlaceHolder('Лахтинский проспект, д. 2, корп. 3, стр. 1, Санкт-Петербург, 197229'); 
		$fields[] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('ФИО потребителя'); 
		$simpleFormBuilder->withName('claimantName'); 
		$simpleFormBuilder->withPlaceHolder('Иванова Ивана Ивановича'); 
		$fields[] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Адрес регистрации потребителя (прописки)'); 
		$simpleFormBuilder->withName('claimantAdress'); 
		$simpleFormBuilder->withPlaceHolder('115580, ул. Мусы Джалиля, д. 5-1, кв. 96'); 
		$fields[] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Наименование магазина продавца (импортёра, производителя)'); 
		$simpleFormBuilder->withName('shopName'); 
		$simpleFormBuilder->withPlaceHolder('Название магазина (например, ДНС, М-Видео и т.д.)'); 
		$fields[] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Цена смартфона'); 
		$simpleFormBuilder->withName('phonePrice'); 
		$simpleFormBuilder->withPlaceHolder(0); 
		$fields[] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Гарантийный срок'); 
		$simpleFormBuilder->withName('warrantyTerm'); 
		$simpleFormBuilder->withPlaceHolder(0); 
		$fields[] = $simpleFormBuilder->buildSimpleBlock(); 

		$simpleFormBuilder->withTitle('Описание недостатка'); 
		$simpleFormBuilder->withName('flawDescription'); 
		$simpleFormBuilder->withPlaceHolder('Например, выключается экран, не работает камера и т.д.'); 
		$fields[] = $simpleFormBuilder->buildSimpleBlock(); 

		$multiInputs = []; 

		$multiFormBuilder = new MultiFormBuilder(); 

		$multiFormBuilder->withTitleMulti('Название модели телефона, цвет, IMEI'); 
		$multiFormBuilder->withInputs(); 
		$multiFormBuilder->withPhoneName('Название модели смартфона (например Realme C35 4/64Gb, RMX3511)'); 
		$multiFormBuilder->withPhoneColor('Цвет'); 
		$multiFormBuilder->withIMEI('IMEI');
		$multiInputs[] = $multiFormBuilder->buildMultiBlock();
									
		$selectors = []; 

		$selectorsFormBuilder = new SelectorsFormBuilder(); 

		$selectorsFormBuilder->withSelectorsTitle('Дата приобретения товара');  
		$selectorsFormBuilder->withDay('date');
		$selectorsFormBuilder->withMonth('month'); 
		$selectorsFormBuilder->withYear('year'); 
		$selectors[] = $selectorsFormBuilder->buildSelectors();

		$selectorsFormBuilder->withSelectorsTitle('Дата чека (документа о продаже товара)');  
		$selectorsFormBuilder->withDay('docDate');
		$selectorsFormBuilder->withMonth('docMonth'); 
		$selectorsFormBuilder->withYear('docYear'); 
		$selectors[] = $selectorsFormBuilder->buildSelectors();

		$selectorsFormBuilder->withSelectorsTitle('Дата составления претензии');  
		$selectorsFormBuilder->withDay('claimDate');
		$selectorsFormBuilder->withMonth('claimMonth'); 
		$selectorsFormBuilder->withYear('claimYear'); 
		$selectors[] = $selectorsFormBuilder->buildSelectors();

						
		$monthsList = new DataFormBuilder();
		$months = $monthsList->months; 
				
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
    
    
