<?php
	require('./functions/functions.php');
	
	include('inc/header.php');
	include('inc/head.php');
?>
	<style>
	body{
		background: #F1F3F6 !important;	
	}	
	</style>
	
	
	<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
		<div class="col-md-10">
			
            <div class="receipt bg-white p-3 rounded"><img src="https://i.imgur.com/zCAnG06.png" width="120">
                <h4 class="mt-2 mb-3">Your order is confirmed!</h4>
                <h6 class="name">Hello <?php echo $_SESSION['user_name'];?>,</h6><span class="fs-12 text-black-50">your order has been confirmed and will be shipped in two days</span>
                <hr>
				<?php 
					$uid = $_SESSION['user_ID'];
					echo $sql = "select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id = '$uid' and order_status.id = `order`.order_status";
					$total_price = 0;
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res))
					{
						$total_price = $total_price + ($row['qty'] * $row['price']);
					
				
				?>
				<div class="d-flex justify-content-between align-items-center product-details" style="margin-top:13px;">
                    <div class="d-flex flex-row product-name-image"><img class="rounded" src="uploads/<?=$row['img_thumb'];?>" width="80">
                        <div class="d-flex flex-column justify-content-between ml-2">
                            <div><span class="d-block font-weight-bold p-name">Ralco formal shirts for men</span><span class="fs-12">Clothes</span></div><span class="fs-12">Qty: 1pcs</span>
                        </div>
                    </div>
                    <div class="product-price">
                        <h5>$70</h5>
                    </div>
                </div>
					<?php }?>
                <div class="d-flex justify-content-between align-items-center product-details" style="margin-top:13px;">
                    <div class="d-flex flex-row product-name-image"><img class="rounded" src="https://i.imgur.com/b7Ve3fJ.jpg" width="80">
                        <div class="d-flex flex-column justify-content-between ml-2">
                            <div><span class="d-block font-weight-bold p-name">Ralco formal Belt for men</span><span class="fs-12">Accessories</span></div><span class="fs-12">Qty: 1pcs</span>
                        </div>
                    </div>
                    <div class="product-price">
                        <h6>$50</h6>
                    </div>
                </div>
                <div class="mt-5 amount row">
                    <div class="d-flex justify-content-center col-md-6"><img src="https://i.imgur.com/AXdWCWr.gif" width="250" height="100"></div>
                    <div class="col-md-6">
                        <div class="billing">
                            <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold">$120</span></div>
                            <div class="d-flex justify-content-between mt-2"><span>Shipping fee</span><span class="font-weight-bold">$15</span></div>
                            <div class="d-flex justify-content-between mt-2"><span>Tax</span><span class="font-weight-bold">$5</span></div>
                            <div class="d-flex justify-content-between mt-2"><span class="text-success">Discount</span><span class="font-weight-bold text-success">$25</span></div>
                            <hr>
                            <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold text-success">$165</span></div>
                        </div>
                    </div>
                </div><span class="d-block">Expected delivery date</span><span class="font-weight-bold text-success">12 March 2020</span><span class="d-block mt-3 text-black-50 fs-15">We will be sending a shipping confirmation email when the item is shipped!</span>
                <hr>
                <div class="d-flex justify-content-between align-items-center footer">
                    <div class="thanks"><span class="d-block font-weight-bold">Thanks for shopping</span><span>Amazon team</span></div>
                    <div class="d-flex flex-column justify-content-end align-items-end"><span class="d-block font-weight-bold">Need Help?</span><span>Call - 974493933</span></div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php 
	include('inc/footer.php');
	include('inc/script.php');
?>
