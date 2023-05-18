<?php 

namespace App\ViewHelper;  

class MultiFormBuilder 
{ 
    const TITLE = 'title'; 
    const INPUTS = 'inputs';
    const PHONENAME = 'phoneName';  
    const PHONECOLOR = 'phoneColor'; 
    const IMEI = 'imei'; 
    private $multiInputs = [];
    
    public function withTitleMulti(string $title): void
    { 
        $this->multiInputs[self::TITLE] = $title; 
    }

    public function withInputs(): void 
    { 
        $this->multiInputs[self::INPUTS] = []; 
    }

    public function withPhoneName (string $phoneName): void 
    { 
        $this->multiInputs[self::INPUTS][self::PHONENAME] = $phoneName; 
    }

    public function withPhoneColor (string $phoneColor): void 
    { 
        $this->multiInputs[self::INPUTS][self::PHONECOLOR] = $phoneColor; 
    }

    public function withIMEI (string $imei): void 
    { 
        $this->multiInputs[self::INPUTS][self::IMEI] = $imei; 
    }

    public function buildMultiBlock(): array  
    {   
        return $this->multiInputs; 
    }
}