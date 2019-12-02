<?php if($showValueAll == 1) { ?>
		<option value=""><?= $textValueAll ?></option>
<?php } ?>

<?php 
foreach($model as $item) { ?>

	<option <?= $item['id'] == $dataSelected ? "selected" : ""  ?> value="<?= $item['id'] ?>"><?= $item['_prefix'] . " " .$item['_name'] ?></option>
<?php } ?>