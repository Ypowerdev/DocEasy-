<?php 

namespace App\Exception; 

class CustomException extends \RuntimeException
{ 
    private array $custom; 

    public function __construct(array $custom)
    { 
        parent::__construct(); 

        $this->custom = $custom; 
    }

    public function getFields(): array
    {         
        return $this->custom;               
    }
}

