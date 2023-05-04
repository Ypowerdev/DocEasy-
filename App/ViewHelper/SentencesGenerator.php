<?php 

namespace App\ViewHelper; 

class SentencesGenerator 
{ 
    public function generateSentences(array $accesoriesArrName, array $accesoriesArrPrice): string
    {
        $sentences = []; 
        
        if(!count($accesoriesArrName)){ 
            return '';
        }

        foreach ($accesoriesArrName as $key => $value) {
            if (!empty($value)) {
                $sentences[] = mb_strtolower($value) . "стоимостью&nbsp;" . $accesoriesArrPrice[$key] . "&nbsp;рублей";
            }
        }

    return '<p>Также для совестного использования с указанным смартфоном были приобретены дополнительно:&nbsp'
    . implode(' и ', $sentences); 
      
    }        
}

