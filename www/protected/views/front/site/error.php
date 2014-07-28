<?php
$this->breadcrumbs=array(
	'Error',
);
?>
<h2 style="color: red;">Error <?php echo $error['code']; ?></h2>
<br>
<div class="error">
<?php echo CHtml::encode($error['message']); ?>
</div>