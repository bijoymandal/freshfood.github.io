<section class="new-product">
	<div class="container-fluid">
		<div class="title-box1">
			<h2> New Arrivals</h2>
		</div>
		<div class="row">
			<?php 
				$sql = "select * from products where best_seller=1 order by prod_id DESC";
				$res = mysqli_query($conn,$sql);
				if(mysqli_num_rows($res)>0)
				{
					while($row = mysqli_fetch_assoc($res))
					{
					 ?>
						<div class="col-md-4 col-lg-2 col-sm-12">
							<div class="product-top">
								<img src="uploads/<?php echo $row['img_thumb']?>">
								<div class="overlay-right">
									<button type="button" class="btn btn-secondary">
										<a><i class="fa fa-eye"></i></a>
									</button>
									
									<button type="button" class="btn btn-secondary"><a class="wish-cart"><i class="fa fa-heart-o"></i></a></button>
									<button type="button" class="btn btn-secondary"><a><i class="fa fa-shopping-cart"></i></a></button>
								</div>
							</div>
							<div class="product-bottom text-center">
								<h3 style="font-size:15px;font-weidth:bold"; ><?php echo $row['prod_name'];?></h3>
								<h3 style="font-size:12px;font-weidth:bold"; ><s>RS:<?php echo $row['oriprice'];?></s></h3>
								<h5>RS:<?php echo $row['sellprice'];?></h5>
							</div>
						</div>
					<?php 
					}
				}	
			?>
		</div>
	</div>
</section>