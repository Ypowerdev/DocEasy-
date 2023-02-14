<?php

class DocFiller 
{ 
    private float $phonePrice; 
    private array $accesoriesArrName; 
    private array $accesoriesArrPrice; 

    public function __construct(array $post)
    { 
        $this->phonePrice = $post['phonePrice']; 
        $this->accesoriesArrName = $post['accesoriesArrName']; 
        $this->accesoriesArrPrice = $post['accesoriesArrPrice']; 
    }

    private function generateSentences(): string
    {
        $sentences = []; 
        if(count($this->accesoriesArrName)){ 
            foreach ($this->accesoriesArrName as $key => $value) {
                if (!empty($value)) {
                    $sentences[] = mb_strtolower($value) . "стоимостью&nbsp;" . $this->accesoriesArrPrice[$key] . "&nbsp;рублей";
                }
            }
            return '<p>Также для совестного использования с указанным смартфоном были приобретены дополнительно:&nbsp'
            . implode(' и ', $sentences); 
        }
        return ''; 
    }

    private function calculateAcessoriesPrice(): float 
    { 
        $accesoriesPrice = 0;

        foreach ($this->accesoriesArrPrice as $key => $value) {
            $accesoriesPrice += $this->accesoriesArrPrice[$key];
    }    
        return $accesoriesPrice; 
    }

    private function calculateTotalPrice(): float 
    { 
        $totalPrice = $this->phonePrice+$this->calculateAcessoriesPrice();
        return $totalPrice; 
    }    
       
    public function generateHtmlTemplate() 
    { 
        if($_SERVER["REQUEST_METHOD"] != "POST"){ 
            return ''; 
        } 
        
        $search = []; 
        $replace = []; 
        
        foreach ($_POST as $fieldName => $fieldValue) {
            $$fieldName = $fieldValue;
            $search[] = "{{{$fieldName}}}";
            $replace[] = $fieldValue;
        } 

        $sentences = $this->generateSentences(); 

        $search[] = '{{sentences}}'; 
        $replace[] = $sentences; 

        $acessoriesHolder = "<p> 2. Сумму в размере" . "&nbsp;" . $this->calculateAcessoriesPrice() . "&nbsp;" . "рублей (стоимость дополнительных аксессуаров).";
        
        $search[] = '{{accesoriesHolder}}';
        $replace[] = $accesoriesHolder;   

        $totalHolder = "<p>А всего:" . "&nbsp;" . $this->calculateTotalPrice() . "&nbsp;" . "рублей.</p>";

        $search[] = '{{totalHolder}}'; 
        $replace[] = $totalHolder; 

        $textTemplate = file_get_contents('template-requirements.html');

        $textReplaced = str_replace($search, $replace, $textTemplate);

        echo $textReplaced;

    }
} 
   
$docFiller = new DocFiller($_POST); 
$docFiller -> generateHtmlTemplate(); 
