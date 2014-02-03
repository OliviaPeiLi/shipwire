<html>
<head>
<title>Product Form</title>
</head>
<body>

<?php echo validation_errors(); ?>
<? 
	$form_url = 'order/form';
?>
<?php echo form_open($form_url); ?>

<div>Recipient Name</div>
<?=form_input('recipient', isset($order->recipient) ? $order->recipient : '');?>

<div>Street</div>
<?=form_input('street1', isset($order->street1) ? $order->street1 : '');?>

<div>Street</div>
<?=form_input('street2', isset($order->street2) ? $order->street2 : '');?>

<div>City</div>
<?=form_input('city', isset($order->city) ? $order->city : '');?>

<div>State</div>
<?=form_input('state', isset($order->state) ? $order->state : '');?>

<div>Zip Code</div>
<?=form_input('zip_code', isset($order->zip_code) ? $order->zip_code : '');?>

<div>Phone Number</div>
<?=form_input('phone_number', isset($order->phone_number) ? $order->phone_number : '');?>

<div>Products</div>
<?  
	foreach($products as $product){
		echo '<div>'.form_checkbox('products[]', $product->id, false).$product->name.'.  Quantity:'.form_input("quantity[$product->id]",'').'</div>';
	}
?>


<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>