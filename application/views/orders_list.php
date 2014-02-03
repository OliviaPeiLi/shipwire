<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    
	<title>Orders List</title>
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
		    window.location.replace("/index.php/welcome/order_records");
		};				
		
	});
	</script>
</head>
<body>

<div>
	<h1>Orders List</h1>
	<button class="btn" id="createBtn" data="/index.php/order/form" data-title="Create a new order">New Order</button>
	<table>
		<? if(empty($orders)){ ?>
			There is no order!
		<? }else{ ?>
			
			<table border="1">
				<tr>
					<td>Recipient Name</td>
					<td>Order Key</td>
					<td>Details</td>
				</tr>
				<? foreach($orders as $order){ ?>
				<tr>
					<td><?=$order->recipient?></td>
					<td><?=$order->order_key?></td>
					<td><a class="details_link" href="#" data="/index.php/order/details?order_key=<?=$order->order_key?>" data-title="Order Details">Details</a></td>
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
      <iframe src="" style="zoom:0.60" width="500" height="700" frameborder="0"></iframe>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal">OK</button>
	</div>
</div>


</body>
</html>