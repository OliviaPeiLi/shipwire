<html>
<head>
<title>Product Form</title>
</head>
<body>

<?php echo validation_errors(); ?>
<? 
	$form_url = 'product/form';
	if(isset($product->product_key)){
		$form_url = $form_url.'?product_key='.$product->product_key;
	}
?>
<?php echo form_open($form_url); ?>

<div>Name</div>
<?=form_input('name', isset($product->name) ? $product->name : '');?>

<div>Description</div>
<?=form_textarea('description', isset($product->description) ? $product->description : '');?>

<div>Width</div>
<?=form_input('width', isset($product->width) ? $product->width : '');?>

<div>Height</div>
<?=form_input('height', isset($product->height) ? $product->height : '');?>

<div>Length</div>
<?=form_input('length', isset($product->length) ? $product->length : '');?>

<div>Weight</div>
<?=form_input('weight', isset($product->weight) ? $product->weight : '');?>

<div>Price</div>
<?=form_input('value', isset($product->value) ? $product->value : '');?>

<?
	if(isset($product->product_key)){
		echo form_hidden('product_key', $product->product_key);
		echo form_hidden('id', $product->id);
	}
?>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>