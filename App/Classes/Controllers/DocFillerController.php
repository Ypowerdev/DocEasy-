<?php

namespace App\Classes\Controllers;

use App\DocumentParams\DocumentParams; 
use App\ViewHelper\SentencesGenerator; 
use App\View\View; 

class DocFillerController implements PostableInterface 
{ 
    private array $postParams=[]; 
    private View $view; 

    public function __construct()
	{		
		$this->view = new View(APPLICATION_PATH . '/templates'); 
	}

    public function generateHtmlTemplate() 
    {                
       $documentParams = $this->createDocumentParams(); 

       $sentencesGenerator = new SentencesGenerator(); 
        
       $simpleFieldsNames = 
       [ 
        'companyName', 'companyAdress', 'claimantName', 'claimantAdress', 
        'shopName', 'phonePrice', 'warrantyTerm', 'date', 'month', 'year', 
        'phoneName', 'phoneColor', 'imei', 'flawDescription', 'docDate', 
        'docMonth', 'docYear', 'claimDate',  'claimMonth', 'claimYear' 
       ]; 

       $simpleFields = [];
       foreach($simpleFieldsNames as $simpleFieldName){
        if (!isset($this->postParams[$simpleFieldName])){ 
            echo 'Поле' . '"' . $simpleFieldName . '"' . 'не заполнено'; 
        } 
         $simpleFields[$simpleFieldName] = $this->postParams[$simpleFieldName];
       }     
    		
       $sentences = [];  
       $accesories = []; 
       $total = [];      
                     
       $firstSentence = $sentencesGenerator->generateSentences(
            $this->postParams['accesoriesArrName'], 
            $this->postParams['accesoriesArrPrice']
        ); 
       $secondSentence = $sentencesGenerator->generateSentences(
            $this->postParams['accesoriesArrName'], 
            $this->postParams['accesoriesArrPrice']
       ); 

       $sentences[] = $firstSentence; 
       
       $accesoriesHolder = "<p> 2. Сумму в размере" . "&nbsp;" . $documentParams->calculateAcessoriesPrice() . "&nbsp;" . "рублей (стоимость дополнительных аксессуаров).";
        
       $accesories[] = $accesoriesHolder; 

       $totalHolder = "<p>А всего:" . "&nbsp;" . $documentParams->calculateTotalPrice() . "&nbsp;" . "рублей.</p>";

       $total[] = $totalHolder;  
                
		$this->view->renderHtml('claim1print/claim1print.php', 
            [
                'simpleFields' => $simpleFields, 
                'sentences' => $sentences, 
                'accesories' => $accesories, 
                'total' => $total
            ]    
        );	              
    }
        
    public function setPostParams(array $postParams): void
    { 
        $this->postParams = $postParams;
    }   
    
    public function createDocumentParams() : DocumentParams
    { 
       return new DocumentParams(          
           (float) $this->postParams['phonePrice'],            
           (array) $this->postParams['accesoriesArrName'],            
           (array) $this->postParams['accesoriesArrPrice']
        );                
    }
}



   
