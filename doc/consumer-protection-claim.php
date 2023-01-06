<?php 
if ($_POST) { 
    
    foreach($_POST as $fieldName => $fieldValue) {
        $$fieldName = $fieldValue;
    }
}
?> 


<p align='right' style ="padding-top:30px">
В <?=$companyName;?><br> 
Адрес:<?=$companyAdress;?>  <br>
    
от  <?=$claimantName;?> <br>       
Адрес: <?=$claimantAdress;?><br>   
<br>
     
<h4 align='center'> Требование о принятии товара ненадлежащего качества и возврате его стоимости, 
компенсации убытков </h4> <br>

<p> <?= $date."\n"; ?><?=$month."\n"; ?><?= $year."\n"; ?> г.  мной, в магазине <?=$shopName."\n"; ?> , был приобретён смартфон <?=$phoneName."\n"; ?>  цвет <?=$phoneColor."\n";?> imei1:<?=$imei."\n";?> ,  что подтверждается 
наличием чека (Приложение № 1).</p>

<p>За указанный телефон мной было уплачено <?= $phonePrice."\n"; ?>  рублей.</p>
<p>Также для совестного использования с указанным смартфоном были приобретены дополнительно: <?= (isset($accesories1)) ? $accesories1  : "  "."\n"; ?> стоимостью <?= (isset($priceAcessories1)) ? $priceAcessories1 : "  " ."\n"; ?> рублей, <?= (isset($accesories2)) ? $accesories2 : "  "."\n";?> стоимостью <?= (isset($priceAcessories2)) ? $priceAcessories2 : "  "."\n"; ?>  рублей. . 
Гарантийный срок, установленный изготовителем на товар, составляет <?= $warrantyTerm; ?> месяцев. </p>
<p>В период гарантийного срока  <?= $flawDescription ?>. </p> 
<p>Так как устройство мной эксплуатировалось в соответствии с инструкцией по эксплуатации, считаю, что причина возникновения недостатков носит производственный характер (недостаток возник до момента передачи или по причинам, возникшим до этого момента). </p>
<p>На основании вышеизложенного и в соответствии со ст. 18 Закона РФ «О защите прав потребителей» я требую принять товар с недостатками (разъяснить порядок передачи и приёмки его у меня, как у потребителя) и возвратить мне: </p>

<p>1.	Сумму в размере <?= $phonePrice."\n"; ?> рублей (стоимость смартфона  <?=$phoneName."\n";?>  imei: <?=$imei."\n";?>)</p> 

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    if (!empty($accesories1) && !empty($priceAcessories1) && !empty($accesories2) && !empty($priceAcessories2)){ 
      $totalPrice = $priceAcessories1+$priceAcessories2; 
          echo "<p>2. Сумму в размере" . "&nbsp" . $totalPrice . "рублей (стоимость дополнительных аксессуаров)."; 
            }elseif(!empty($accesories1) && !empty($priceAcessories1)){ 
                echo "<p>2. Сумму в размере". "&nbsp" . $priceAcessories1 . "рублей (стоимость дополнительных аксессуаров)." ; 
                   } else {
                       print "   "; 
    }
} 

if ($totalPrice): 
    $total1 = $phonePrice+$totalPrice; 
    echo "<p>А всего:" . "&nbsp". $total1 ."&nbsp". "рублей.</p>";  
elseif ($priceAcessories1):
    $total2 = $phonePrice+$priceAcessories1; 
    echo "<p>А всего:". "&nbsp". $total2. "&nbsp". "рублей.</p>";
else: 
    echo "<p>А всего:" . "&nbsp". $phonePrice."&nbsp". "рублей.</p>"; 
endif;
?>

<p>Данное требование прошу рассмотреть и удовлетворить в течение 10 дней с момента его получения.</p> 

<p align = 'left'>Приложения: </p>

<p align = 'left'>1.	Документы о продаже от <?= $docDate."\n"; ?><?= $docMonth."\n"; ?><?= $docYear."\n"; ?> г.; </p><br>

<p>Дата:  &nbsp <?= $claimDate."\n"; ?><?= $claimMonth."\n"; ?><?= $claimYear."\n"; ?> г.   &nbsp &nbsp &nbsp &nbsp	 <?=$claimantName; ?>   &nbsp &nbsp  &nbsp &nbsp   Подпись: _________________</p>
