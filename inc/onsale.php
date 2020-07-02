 	<section class="on-sale">
		<div class="container-fluid"> 
			<div class="title-box">
				<h2>On Sale</h2>
			</div>
			<div class="row">
				<?php 
					$get_product = get_product($conn,5);
					//print_r($get_product);
					foreach($get_product as $list)
					{
						 ?>
							<div class="col-md-4 col-lg-2 col-sm-12">
								<form method="post">
								<div class="product-top">
									<div class="sale-on-img">	
										<a href="product.php?id=<?php echo $list['prod_id'];?>"><img src="uploads/<?php echo $list['img_thumb'];?>"></a>
										<h3>
											<?php echo $list['prod_name'];?>
											<p>Upto 30% off</p>
										</h3>
										<ul class="ul">
											<li>Offer </li>
										</ul>
									</div>
									
									<!--<img src="img\20000910-2_4-fresho-orange-imported.jpg">-->
									<div class="overlay-right">	
										<button type="button" class="btn btn-secondary" title="Quick View"><i class="fa fa-eye"></i></button>
										
										<button type="button" class="btn btn-secondary" title="ADD to Wishlist" onclick="manage_wishlist('<?php echo $list['prod_id']?>','add')"><i class="fa fa-heart-o"></i></button>
										<button type="button" class="btn btn-secondary" title="Add to cart"onclick="manage_cart('<?php echo $list['prod_id']?>','add')"><i class="fa fa-shopping-cart"></i></button>
									</div>
								</div>
								
								<div class="product-bottom text-center">
									<h3 style="font-size:12px;font-weidth:bold"; ><s>RS:<?php echo $list['oriprice'];?></s></h3>
									<h5>RS:<?php echo $list['sellprice'];?></h5>
								</div>
								</form>
							</div>
						 <?php
						}
				?>
			</div>
		</div>
	</section>
	
	
	
	
	
	
	
	
	
	
	
	
	