<?php include __DIR__. '/../module_header.php';?>


  
  <p align = 'left'> В <?=$simpleFields['companyName'] ?><br> 
  
  Адрес:<?=$simpleFields['companyAdress']?> <br>
      
  от  <?=$simpleFields['claimantName']?> <br>       
  Адрес:<?=$simpleFields['claimantAdress']?></p><br>   
  
       
  <h5 align='center'> Требование о принятии товара ненадлежащего качества и возврате его стоимости, 
  компенсации убытков </h5> <br>
  
  <p> <?=$simpleFields['date']?> <?=$simpleFields['month']?> <?=$simpleFields['year']?> г.  мной, в магазине <?=$simpleFields['shopName']?>, был приобретён смартфон <?=$simpleFields['phoneName']?>  цвет <?=$simpleFields['phoneColor']?> imei1: <?=$simpleFields['imei']?>,  что подтверждается 
  наличием чека (Приложение № 1).</p>
  
  <p>За указанный телефон мной было уплачено <?=$simpleFields['phonePrice']?>  рублей.</p>

  <?=$sentences[0]?>
 
   
  <p>Гарантийный срок, установленный изготовителем на товар, составляет <?=$simpleFields['warrantyTerm']?> месяцев. </p>
  <p>В период гарантийного срока <?=$simpleFields['flawDescription']?>.</p> 
  <p>Так как устройство мной эксплуатировалось в соответствии с инструкцией по эксплуатации, считаю, что причина возникновения недостатков носит производственный характер (недостаток возник до момента передачи или по причинам, возникшим до этого момента). </p>
  <p>На основании вышеизложенного и в соответствии со ст. 18 Закона РФ «О защите прав потребителей» я требую принять товар с недостатками (разъяснить порядок передачи и приёмки его у меня, как у потребителя) и возвратить мне: </p>
  
  <p>1.	Сумму в размере  <?=$simpleFields['phonePrice']?>  рублей (стоимость смартфона <?=$simpleFields['phoneName']?>   imei: <?=$simpleFields['imei']?> )</p> 
  
  <?=$accesories[0]?>
  
  <?=$total[0]?>
  
  <p>Данное требование прошу рассмотреть и удовлетворить в течение 10 дней с момента его получения.</p> 
  
  <p align = 'left'>Приложения: </p>
  
  <p align = 'left'>1.	Документы о продаже от <?=$simpleFields['docDate']?> <?=$simpleFields['docMonth']?> <?=$simpleFields['docYear']?> г. </p><br>
  
  <p>Дата:  &nbsp <?=$simpleFields['claimDate']?> <?=$simpleFields['claimMonth']?> <?=$simpleFields['claimYear']?> г.   &nbsp &nbsp &nbsp &nbsp	 <?=$simpleFields['claimantName']?>  &nbsp &nbsp  &nbsp &nbsp   Подпись: _________________</p>
 

  <?php include __DIR__ . '/../module_footer.php'; ?>
  