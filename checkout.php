<?php
	require('./functions/functions.php');
	include('inc/header.php');
	include('inc/head.php');
?>

    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
	
	<div class="container-fluid">
        <div class="row mt-5">
          <!--col-->
		  <div class="col-lg-8">
			  <?php
				  if(!isset($_SESSION['user_ID']))
				  {
				?>	
              <div class="card shadow-sm" style="width:100%">
                <div class="card-header bg-info text-white">
                  1.LOGIN OR SIGNUP
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <form class="" action="#" method="post">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="username" name='email' style="border:#000;border-bottom:#ccc solid 1px">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" placeholder="password" name="password" style="border:#000;border-bottom:#ccc solid 1px">
                          <input type="hidden" name="p_id" value="">
                        </div>
                        <input class="btn btn-warning w-100 ml-3 text-white h-100" value="Continue" name="">
						</form>
                    </div>
                    <div class="col-lg-6">
                      <div class="container-fluid text-center text-dark">
                        Advantages of our secure login <br><hr>
                        <i class="fas fa-shuttle-van text-info"></i>&nbsp;Easily track orders, Hassel free returns <br><br>
                        <i class="fas fa-bell text-info"></i>&nbsp;Get relevant alerts and recommendation <br><br>
                        <i class="fas fa-star text-info"></i>&nbsp;Wishlist,Reviews,Rating and  Many More...
                      </div>
                    </div>
                  </div>
              </div>
			</div>
			
			<div class="card mt-3 shadow-sm w-100">
				<div class="card-body">2. DELEVERY ADDRESS </div>
			</div>
			<div class="card mt-3 shadow-sm w-100">
				<div class="card-body">3. ORDER SUMMERY </div>
            </div>
			<div class="card mt-3 shadow-sm w-100">
				<div class="card-body">4. PAYMENT OPTION </div>
            </div>
			<?php
				  }
				  else
				  {
					  ?>
					  <script>
						alert("else part");
					  </script>
					  <?php
				  }
			?>
			<div class="card mt-3 shadow-sm w-100">
               <div class="card-body">
                 1. <b></b>Login <i class="fas fa-check"></i>
                 <a href="#" class="btn btn-outline-primary" style="float:right"> Change </a><br>
                <span></span>
               </div>
             </div>
          </div>
		  <!--col-->
		  
		  <!--Price details-->
		  <div class="col-lg-3 ml-3">
				<div class="card shadow">
					<div class="card-header">PRICE DETAILS</div>
					<div class="card-body">
						<table style="width:100%">
							<tr>
								<th>Price(1 item )</th>
								<td style="float:right">₹<span class="price"></span>/-</td>
							</tr>

							<tr>
								<th>Qty</th>
								<td class="float-right">
									<span>
										<button type="button" class="btn btn-outline-danger btn-sm minus">-</button>
										<span class=" btn btn-outline-info display bordered btn-sm text-dark" >1</span>
										<button type="button" class="btn btn-outline-success btn-sm plus">+</button>
									</span>
								</td>
							</tr>
							<tr style="border-bottom:1px solid #ccc">
								<th>Delivery Charge</th>
								<td style="float:right">₹20/-</td>
							</tr>

							<tr>
								<th>Total</th>
								<td style="float:right">₹ <span class="total"></span>/-</td>
							</tr>
					</table>
				</div>
			</div>
		</div>
		<!--Price details-->
      </div>
    </div>

<?php 
	include('inc/footer.php');
	include('inc/script.php');
?>
