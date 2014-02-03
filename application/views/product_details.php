<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    
	<title>Products Details</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!-- <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
	<script type='text/javascript' src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div>
	
	<table>
		<? if(is_null($product)){ ?>
			There is such product!
		<? }else{ ?>
			
			<table border="1">
				<tr>
					<td>Name</td>
					<td><?=$product->name?></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><?=$product->description?></td>
				</tr>
				<tr>
					<td>Width</td>
					<td><?=$product->width?></td>
				</tr>
				<tr>
					<td>Height</td>
					<td><?=$product->height?></td>
				</tr>
				<tr>
					<td>Length</td>
					<td><?=$product->length?></td>
				</tr>
				<tr>
					<td>Weight</td>
					<td><?=$product->weight?></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><?=$product->value?></td>
				</tr>
			</table>	
			
		<? } ?>
	</table>
</div>
	


</body>
</html>