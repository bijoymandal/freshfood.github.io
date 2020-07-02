<!DOCTYPE html>
<html>
<head>
	<title>E-commerce design</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<!--Navigation sction-->
	<div class="top-nav-bar">
		<div class="search-box">
			<i class="fa fa-bars" aria-hidden="true" id="menu-btn" onclick="openmenu()"></i>
			<i class="fa fa-times" aria-hidden="true"id="close-btn" onclick="closemenu()"></i>
			<img src="https://img.icons8.com/metro/26/000000/image-file.png" class="logo">
			<input type="text" class="form-control" name="">
			<span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
		</div>
		<div class="menu-bar">
			<ul>
				<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Login & Sign up</a></li>
				<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="#">Cart</a></li>
			</ul>
		</div>
	</div>
	<section class="single-product">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
				  		<div class="carousel-inner">
				    		<div class="carousel-item active">
				      			<img src="img\10000972_10-fresho-white-prawns-medium.jpg" class="d-block w-50" alt="...">
				    		</div>
				    		<a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
	    						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    						<span class="sr-only">Previous</span>
	  						</a>
	  						<a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
	    						<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    						<span class="sr-only">Next</span>
	  						</a>
				  		</div>
					</div>
				</div>
				<div class="col-md-7">
					<p class="new-arrival text-center">NEW</p>
					<h2>Fresho White Prawns - Medium, 250 g</h2>
					<p>Product Code:W112</p>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
					<p class="price"><i class="fa fa-inr">109.00</i></p>
					<p><b>Avability:</b> In Stock</p>
					<p><b>Condition:</b> New</p>
					<p><b>Brand:</b> ABC Farm company ltd</p>
					<label>Quantity:</label>
					<input type="text" name="1">
					<button type="button" class="btn btn-primary">Add to Cart</button>
				</div>
			</div>
		</div>
	</section>
	<section class="product-description">
		<div class="container">
			<h6><b>Product description</b></h6>
			<p>Fresho Meats is our in house brand of fresh meat, poultry and seafood. We take utmost care in selecting the best suppliers to provide you with high quality and succulent products. Every product is stored in our cold storage right until your doorstep ensuring freshness and utmost hygiene. Additionally, every product is packed using food grade plastic which provides a nourishing and wholesome environment.</p>
			<hr>	
		</div>
		<div class="container">
			<div class="title-box">
				<h2>Smiller Product</h2>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="product-top">
						<img src="img\40006362_3-1st-bites-rice-dal-stage-2-8-24-months.jpg">
						<div class="overlay-right">
							<button type="button" class="btn btn-secondary" title="Quick Shop">
								<i class="fa fa-eye"></i>
							</button>
							<button type="button" class="btn btn-secondary" title="Add to wishlist">
								<i class="fa fa-heart-o"></i>
							</button>
							<button type="button" class="btn btn-secondary" title="Add to Cart">
								<i class="fa fa-shopping-cart"></i>
							</button>
						</div>
					</div>
					<div class="product-buttom text-center">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<h3>Organic Baby Food</h3>
						<h5><i class="fa fa-inr"></i>130.00</h5>
					</div>
				</div>
				<div class="col-md-3">
					<div class="product-top">
						<img src="img\40085808_4-nestle-ceregrow-multigrain-cereal-with-milk-fruits-from-2-5-years.jpg">
						<div class="overlay-right">
							<button type="button" class="btn btn-secondary" title="Quick Shop">
								<i class="fa fa-eye"></i>
							</button>
							<button type="button" class="btn btn-secondary" title="Add to wishlist">
								<i class="fa fa-heart-o"></i>
							</button>
							<button type="button" class="btn btn-secondary" title="Add to Cart">
								<i class="fa fa-shopping-cart"></i>
							</button>
						</div>
					</div>
					<div class="product-buttom text-center">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<h3>ceregrow Food</h3>
						<h5><i class="fa fa-inr"></i>110.00</h5>
					</div>
				</div>
				<div class="col-md-3">
					<div class="product-top">
						<img src="img\40048863_2-fresho-processed-baby-bhetki-whole.jpg">
						<div class="overlay-right">
							<button type="button" class="btn btn-secondary" title="Quick Shop">
								<i class="fa fa-eye"></i>
							</button>
							<button type="button" class="btn btn-secondary" title="Add to wishlist">
								<i class="fa fa-heart-o"></i>
							</button>
							<button type="button" class="btn btn-secondary" title="Add to Cart">
								<i class="fa fa-shopping-cart"></i>
							</button>
						</div>
					</div>
					<div class="product-buttom text-center">
						<i class="fa fa-star checked"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<h3>fresh bhetki</h3>
						<h5><i class="fa fa-inr"></i>300.00</h5>
					</div>
				</div>
				<div class="col-md-3">
					<div class="product-top">
						<img src="img\10000972_10-fresho-white-prawns-medium.jpg">
						<div class="overlay-right">
							<button type="button" class="btn btn-secondary" title="Quick Shop">
								<i class="fa fa-eye"></i>
							</button>
							<button type="button" class="btn btn-secondary" title="Add to wishlist">
								<i class="fa fa-heart-o"></i>
							</button>
							<button type="button" class="btn btn-secondary" title="Add to Cart">
								<i class="fa fa-shopping-cart"></i>
							</button>
						</div>
					</div>
					<div class="product-buttom text-center">
						<i class="fa fa-star" id=""></i>
						<i class="fa fa-star" id=""></i>
						<i class="fa fa-star" id=""></i>
						<i class="fa fa-star-half-o" id=""></i>
						<h3>fresho white prawns</h3>
						<h5><i class="fa fa-inr"></i>130.00</h5>
					</div>
				</div>
			</div>
		</div>
		<br>
	</section>
	<section class="footer">
		<div class="container tex-center">
			<div class="row">
				<div class="col-md-3">
					<h1>Useful Links</h1>
					<p>Privacy Policy</p>
					<p>Terms of Use</p>
					<p>Return Policy</p>
					<p>Discount Coupons</p>
				</div>
				<div class="col-md-3">
					<h1>Company</h1>
					<p><strong>About Us</strong></p>
					<p>Contact Us</p>
					<p>Career</p>
					<p>Affilite</p>
				</div>
				<div class="col-md-3">
					<h1>Follow on Us</h1>
					<p><i class="fa fa-facebook-official"></i>Facebook</p>
					<p><i class="fa fa-youtube-play"></i>Youtube</p>
					<p><i class="fa fa-twitter"></i>Twitter</p>
					<p><i class="fa fa-linkedin"></i>Linkedin</p>
				</div>
				<div class="col-md-3 footer-image">
					<h1>Download App</h1>
					<img src="img\payment.jfif" style="width:100%">
				</div>
			</div>
			<hr>
			<p class="copyright">Online Grocery Shop @Bijoy <i class="fa fa-heart-o"></i></p>
		</div>
	</section>
	<script>
		function openmenu()
		{
			document.getElementById("side-menu").style.display="block";
			document.getElementById("menu-btn").style.display="none";
			document.getElementById("close-btn").style.display="block";
		}
		function closemenu()
		{
			document.getElementById("side-menu").style.display="none";
			document.getElementById("menu-btn").style.display="block";
			document.getElementById("close-btn").style.display="none";
		}
	</script>
</body>
</html>