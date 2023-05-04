<?php 

namespace App\DocumentParams; 

class DocumentParams 
{ 
    public function __construct( 
        public readonly float $phonePrice, 
        public readonly array $accesoriesArrName, 
        public readonly array $accesoriesArrPrice  
    )
    {
    }
    
    public function calculateTotalPrice(): float 
    { 
        $totalPrice = $this->phonePrice+$this->calculateAcessoriesPrice();
        return $totalPrice; 
    }    

    public function calculateAcessoriesPrice(): float 
    { 
                
        $accesoriesPrice = 0;
        if (!count($this->accesoriesArrPrice)){ 
            return '';
        }

        foreach ($this->accesoriesArrPrice as $key => $value) {
            $accesoriesPrice += $this->accesoriesArrPrice[$key];
        }
        return $accesoriesPrice; 
    }
   
}