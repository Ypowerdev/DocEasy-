<?php 

namespace App\ViewHelper;  

class SelectorsFormBuilder 
{ 
    const TITLE = 'title'; 
    const DAY = 'day'; 
    const MONTH  = 'month'; 
    const YEAR = 'year'; 
    private $selectors = []; 

    public function withSelectorsTitle(string $title): void
    { 
        $this->selectors[self::TITLE] = $title; 
    }

    public function withDay(string $day): void 
    { 
        $this->selectors[self::DAY] = $day; 
    }

    public function withMonth(string $month): void 
    { 
        $this->selectors[self::MONTH] = $month; 
    }

    public function withYear(string $year): void 
    { 
        $this->selectors[self::YEAR] = $year; 
    }

    public function buildSelectors(): array  
    {   
        return $this->selectors; 
    }
}