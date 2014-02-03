<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    
	<title>Products List</title>
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
	<h1>Products List</h1>
	<button class="btn" id="createBtn" data="/index.php/product/form" data-title="Create a new product">Create</button>
	<table>
		<? if(empty($products)){ ?>
			There is no products!
		<? }else{ ?>
			
			<table border="1">
				<tr>
					<td>Name</td>
					<td>Description</td>
					<td>Width</td>
					<td>Height</td>
					<td>Length</td>
					<td>Weight</td>
					<td>Price</td>
					<td>Details</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
				<? foreach($products as $product){ ?>
				<tr>
					<td><?=$product->name?></td>
					<td><?=$product->description?></td>
					<td><?=$product->width?></td>
					<td><?=$product->height?></td>
					<td><?=$product->length?></td>
					<td><?=$product->weight?></td>
					<td><?=$product->value?></td>
					<td><a class="details_link" href="#" data="/index.php/product/details?product_key=<?=$product->product_key?>" data-title="Product Details">Details</a></td>
					<td><a class="editBtn" href="#" data="/index.php/product/form?product_key=<?=$product->product_key?>" data-title="Edit Product">Edit</a></td>
					<td><a href="/index.php/product/delete?product_key=<?=$product->product_key?>" class="confirm">Delete</a></td>
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
      <iframe src="" style="zoom:0.60" width="900" height="600" frameborder="0"></iframe>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal">OK</button>
	</div>
</div>


</body>
</html>