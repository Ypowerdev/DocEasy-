<?php 

return [
    '~^claim/(\d+)$~' => [
        'class' => App\Classes\Controllers\Claim1FormController::class, 
        'method' => 'printForm',
        'avaiableMethods' => ['GET'] 
    ],
    '~^$~' => [
        'class' => App\Classes\Controllers\MainController::class, 
        'method' => 'main',
        'avaiableMethods' => ['GET']     
    ],
    '~^print/[a-zA-Z0-9_]{1,}$~' => [
        'class' => App\Classes\Controllers\DocFillerController::class, 
        'method' => 'generateHtmlTemplate', 
        'avaiableMethods' => ['POST'] 
    ],
];