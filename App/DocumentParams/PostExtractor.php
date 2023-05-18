<?php 

namespace App\DocumentParams; 

use App\Exception\CustomException; 

class PostExtractor 
{ 
    public function exctractFields($simpleFieldsNames,$postParams): array
    {        
        $errorFields = []; 
        $simpleFields = []; 

        foreach($simpleFieldsNames as $simpleFieldName){
            if (!isset($postParams[$simpleFieldName])){ 
                $errorFields[] = $simpleFieldName; 
            } 
            $simpleFields[$simpleFieldName] = $postParams[$simpleFieldName];              
        } 
           
        if (count($errorFields) > 0){ 
            throw new CustomException($errorFields); 
        } 
        
        return $simpleFields;      
    }
}
