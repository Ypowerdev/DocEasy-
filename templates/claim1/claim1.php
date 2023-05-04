<?php include __DIR__ . '/../module_header.php';?>

<div style="width:45%; text-align: center; margin: auto;">
<form method="post" action="/print/claim1">

<div class="mb-3">
<?php foreach ($fields as $field):?>
    <label for="exampleInputEmail1" class="form-label"><?=$field['title']?></label>
    <input name="<?=$field['name']?>" type="text" placeholder="<?=$field['placeholder']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
<?php endforeach; ?>
</div> 

<div class="mb-3">
<?php foreach ($multiInputs as $input) :?>
    <label for="exampleInputPassword1" class="form-label"><?=$input['title']?></label>
<?php foreach ($input['inputs'] as $name => $placeholder) :?>
    <input name="<?=$name;?>" type="text" placeholder="<?=$placeholder;?>" class="form-control" id="exampleInputPassword1">    
<?php endforeach; ?>
    </div>
<?php endforeach; ?>

<?php foreach ($doubleInputs as $inputs): ?> 
<div class="mb-3">
    <?php foreach ( $inputs as $input ) :?>
          <label for="exampleInputPassword1" class="form-label"><?=$input['title']?></label>
          <input name="<?=$input['name']?>" type="text" placeholder="<?=$input['placeholder']?>" class="form-control" id="exampleInputPassword1">
<?php endforeach; ?>
 </div>
<?php endforeach; ?>


<div class="mb-3">
<?php foreach($selectors as $selector):?>
	<label for="exampleInputPassword1" class="form-label"><?=$selector['title']?></label>
    <select name="<?=$selector['day'];?>"> 
<?php for($i=1; $i<=31; $i++):?> 
	<option><?=$i;?></option>
<?php endfor;?> 
</select>

<select name="<?=$selector['month']?>">
<?php foreach($months as $month):?>
<option><?=$month;?></option>
<?php endforeach;?> 
</select>

<select name="<?=$selector['year'];?>">
<?php for($i = 2015; $i <= 2030; $i++):?>  
	<option><?=$i;?></option>
<?php endfor; ?>
</select>
<?php endforeach; ?> 
</div>

 <button type="submit" class="btn btn-primary">Отправить</button>
 </form>
 </div>

<?php include __DIR__ . '/../module_footer.php'; ?>