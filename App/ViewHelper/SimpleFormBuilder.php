<?php 

namespace App\ViewHelper; 

class SimpleFormBuilder 
{ 
    const TITLE = 'title'; 
    const NAME = 'name'; 
    const PLACEHOLDER = 'placeholder';    

    private $simpleInputs = []; 
    
    public function withTitle(string $title): void
    { 
        $this->simpleInputs[self::TITLE] = $title; 
    }

    public function withName(string $name): void
    { 
        $this->simpleInputs[self::NAME] = $name; 
    }

    public function withPlaceHolder(string|int $placeHolder): void
    { 
        $this->simpleInputs[self::PLACEHOLDER] = $placeHolder; 
    }

    public function buildSimpleBlock(): array  
    {                      
        return $this->simpleInputs; 
    }
}
