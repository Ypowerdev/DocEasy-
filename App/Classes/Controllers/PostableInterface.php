<?php 

namespace App\Classes\Controllers; 

interface PostableInterface
{ 
    public function setPostParams(array $postParams); 
}