<?php 

namespace App\Classes\Controllers;

use App\Exception\CustomException; 
use App\DocumentParams\PostExtractor;
use App\ViewHelper\SentencesGenerator; 
use App\View\View; 
use App\DocumentParams\DocumentParams; 

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
          
    try{ 
        $simpleFields = (new PostExtractor())->exctractFields($simpleFieldsNames, $this->postParams); 
    }catch(CustomException $exception){ 
        foreach ($exception->getFields() as $field){ 
            echo "Поле $field не заполнено"; 
        }       
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
       
       $accesoriesHolder = "2. Сумму в размере" . "&nbsp;" . $documentParams->calculateAcessoriesPrice() . "&nbsp;" . "рублей (стоимость дополнительных аксессуаров).";
        
       $accesories[] = $accesoriesHolder; 

       $totalHolder = "А всего:" . "&nbsp;" . $documentParams->calculateTotalPrice() . "&nbsp;" . "рублей.";

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



   



   
