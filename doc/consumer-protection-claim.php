<?php 


if ($_SERVER["REQUEST_METHOD"] == "POST"){ 

    $search = [];
    $replace = [];

    foreach($_POST as $fieldName => $fieldValue) {
       $$fieldName = $fieldValue;          
       $search[] = "{{$fieldName}}";
       $replace[] = $fieldValue;
    }
    

    if(!empty($accesoriesArrName[0] && !empty($accesoriesArrName[1]))){ 
        $firstSentence = "<p>Также для совестного использования с указанным смартфоном были приобретены дополнительно:" . "&nbsp;". mb_strtolower($accesoriesArrName[0]) . "стоимостью" . "&nbsp;". mb_strtolower($accesoriesArrPrice[0]) ."&nbsp;". "рублей  и" ."&nbsp;". mb_strtolower($accesoriesArrName[1]) . "&nbsp;" ."стоимостью" . "&nbsp;" . mb_strtolower($accesoriesArrPrice[1]) . "&nbsp;" . "рублей.</p>";      
    }elseif(!empty($accesoriesArrName[0])){ 
        $secondSentence = "<p>Также для совестного использования с указанным смартфоном были приобретены дополнительно:" . "&nbsp;" . mb_strtolower($accesoriesArrName[0]) . "&nbsp;". "стоимостью" . "&nbsp;" . mb_strtolower($accesoriesArrPrice[0]) . "&nbsp;" . "рублей.</p>"; 
    }elseif(!empty($accesoriesArrName[1])){ 
        $thirdSentence =  "<p>Также для совестного использования с указанным смартфоном были приобретены дополнительно:" . "&nbsp;" . mb_strtolower($accesoriesArrName[1]) . "&nbsp;" . "стоимостью" . "&nbsp;" . mb_strtolower($accesoriesArrPrice[1]) . "&nbsp;". "рублей.</p>"; 
    }else{ 
        echo ""; 
    }
    
    $search[] = '{{firstSentence}}'; 
    $search[] = '{{secondSentence}}'; 
    $search[] = '{{thirdSentence}}'; 
    $replace[] = $firstSentence; 
    $replace[] = $secondSentence; 
    $replace[] = $thirdSentence; 

    $accesoriesPrice = 0;

    foreach ($accesoriesArrPrice as $key => $value){
       $accesoriesPrice += $accesoriesArrPrice[$key]; 
    }     
    
    
    $accesoriesHolder = "<p>2. Сумму в размере" . "&nbsp;" . $accesoriesPrice . "&nbsp;" . "рублей (стоимость дополнительных аксессуаров).";

    $search[] = '{{accesoriesHolder}}';
    $replace[] =  $accesoriesHolder;

    $totalPrice = $phonePrice + $accesoriesPrice;
    $totalHolder = "<p>А всего:" . "&nbsp;". $totalPrice ."&nbsp;". "рублей.</p>";

    $search[] = '{{totalHolder}}';
    $replace[] =  $totalHolder;

    //получаем текст из файла, по названию файла
    $textTemplate = file_get_contents('template-requirements.html');

    // находим шаблоны вида {{param}} и заменяем на актуальное содержимое
    $textReplaced = str_replace($search, $replace, $textTemplate);

    // выводим результат
    echo $textReplaced;
} 

?>
