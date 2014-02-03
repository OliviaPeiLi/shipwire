<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    
	<title>Order details</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!-- <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
	<script type='text/javascript' src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		
		$('#createBtn, .editBtn, .details_link').click(function(){	
			var frameSrc = $(this).attr("data");		
			var title = $(this).attr("data-title");
			var class_name = $(this).attr("class");
			$('#myModal').on('show', function () {
				if(class_name != 'details_link'){
					$('.modal-footer').toggle();
				}
				$('#iframeTitle').text(title);
		        $('iframe').attr("src",frameSrc);
			});
		    $('#myModal').modal({show:true})
		});
		
		window.closeModal = function(){
		    $('#myModal').modal('hide');
		    window.location.replace("/");
		};	
		
		$('.confirm').click(function(){
	        var answer = confirm("Are you sure you want to delete this item?");
	        if (answer){
	            return true;
	        } else {
	            return false;
	        }
	    });
		
		
	});
	</script>
	
</head>
<body>

<div>
	
	<table>
		<? if(is_null($order)){ ?>
			There is such order!
		<? }else{ ?>
			
			<table border="1">
				<tr>
					<td>Recipient Name</td>
					<td><?=$order->recipient?></td>
				</tr>
				<tr>
					<td>Street</td>
					<td><?=$order->street1?> <?=$order->street2?></td>
				</tr>
				<tr>
					<td>City</td>
					<td><?=$order->city?></td>
				</tr>
				<tr>
					<td>State</td>
					<td><?=$order->state?></td>
				</tr>
				<tr>
					<td>Zip Code</td>
					<td><?=$order->zip_code?></td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td><?=$order->phone_number?></td>
				</tr>
			</table>
			
			<table border="2	">
				<tr>
					<td>Products</td>
					<td>Quantity</td>
					<td>Details</td>
					<td>Short URL</td>
				</tr>
				<? foreach($products as $product_data){ ?>
				<tr>
					<td>
						<?=$product_data->product->name?>
					</td>
					<td>
						<?=$product_data->quantity?>
					</td>
					<td>
						<a class="details_link" href="#" data="/index.php/product/details?product_key=<?=$product_data->product->product_key?>" data-title="Product Details">Details</a>
					</td>
					<td>
						<? $short_url =shortnerUrl("http://localhost:8888/index.php/product/details?product_key=".$product_data->product->product_key); ?>
						<a href="<?=$short_url?>" target="_blank"><?=$short_url?></a>
					</td>
				</tr>
				<? } ?>
			</table>	
			
		<? } ?>
	</table>
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3><div id="iframeTitle">Product Form</div></h3>
	</div>
	<div class="modal-body">
      <iframe src="" style="zoom:0.60" width="400" height="200" frameborder="0"></iframe>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal">OK</button>
	</div>
</div>
	


</body>
</html>