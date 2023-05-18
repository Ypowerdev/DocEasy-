<?php

namespace App\Classes\Controllers;

use App\View\View; 
use App\Services\Db\Db;

class MainController
{
    private $view; 
    private $db;

    public function __construct()
    {
        $this->view = new View(APPLICATION_PATH  . '/templates/');
        $this->db = Db::getInstance();
    }

	public function main(): void
    {
        $links = $this->db->query('SELECT * FROM `main_list`;');              
        $this->view->renderHtml('main/main.php', ['links' => $links]);
    }    
}
    
    
