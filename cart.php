<?php
	include_once('./functions/functions.php');
	
	//link title page 
	include('inc\header.php');
	//heading page 
	include('inc\head.php');
	
	//print_r($_SESSION);
	
?>
	<div class="card">
		<div class="row">
			<div class="col-md-8 cart">
				<div class="title">
					<div class="row">
						<div class="col">
							<h4><b>Shopping Cart</b></h4>
						</div>
						<div class="col align-self-center text-right text-muted"><?php echo $totalProduct;?> items</div>
					</div>
				</div>
				<div class="row border-top border-bottom">
					<?php 
						foreach($_SESSION['cart'] as $key =>$value)
						{
							$productArr = get_product($conn,'','',$key);
							//print_r($productArr);
							$pname = $productArr[0]['prod_name'];
							$catname = $productArr[0]['category_name'];
							$pimage = $productArr[0]['img_thumb'];
							$Sprice = $productArr[0]['sellprice'];
							$qty = $value['qty'];
					?>
					<div class="row main align-items-center">
						<div class="col-2"><img class="img-fluid" src="uploads/<?php echo $pimage;?>"></div>
						<div class="col">
							<div class="row text-muted"><?php echo $catname;?></div>
							<div class="row"><?php echo $pname?></div>
						</div>
						<div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>
						<div class="col">Rs.<?php echo $qty * $Sprice; ?><a class="close" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">&#10005;</a></div>
					</div>
					<?php
						}
					?>
				</div>
				<div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
			</div>
			<div class="col-md-4 summary">
				<div>
					<h5><b>Summary</b></h5>
				</div>
				<hr>
				<div class="row">
					<div class="col" style="padding-left:16px;">ITEMS </div>
					<div class="col text-right">Rs.<?php echo $qty * $Sprice; ?></div>
				</div>
				<form>
					<p>SHIPPING</p> <select>
						<option class="text-muted">Standard-Delivery- Rs.5.00</option>
					</select>
					<p>GIVE CODE</p> <input id="code" placeholder="Enter your code">
				</form>
				<div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
					<div class="col">TOTAL PRICE</div>
					<div class="col text-right">Rs.<?php echo $qty * $Sprice; ?></div>
				</div> 
				<a href="checkout.php"class="btn btn-primary" style="width:100%;">Checkout</a>
			</div>
		</div>
	</div>
<style>

</style>


<?php	
	//footer
	include('inc\footer.php');
	//scritpts
	include('inc\script.php');
?>