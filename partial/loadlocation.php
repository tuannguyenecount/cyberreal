<?php foreach($model as $item) { ?>
	<option <?= $item['id'] == $dataSelected ? "selected" : ""  ?> value="<?= $item['id'] ?>"><?= $item['_name'] ?></option>
<?php } ?>