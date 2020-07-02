<?php 
	include('inc/header.php');
	include('inc/head.php');
?>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
		<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="row" style="padding:0px 10px 0px 3px;background:#ffffff;margin-left:2px;">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								
								<div class="side-menu" id="side-menu" style="width:100%;">
									<ul>
										<?php
											$sql = "SELECT * FROM `category` WHERE parent_id=0 order BY category_name ASC";
											$result = mysqli_query($conn,$sql);
											while($row = mysqli_fetch_assoc($result))
											{
												?>
										
												<li><a href="category.php?id=<?php echo $row['category_id']?>"><?php echo $row['category_name'];?></a><i class="fa fa-angle-right" aria-hidden="true"></i>
													<!--<ul>
														<li><a href="#<?php echo $row['parent_id'];?>"><?php echo $row['category_name'];?></li>
													</ul>-->
												</li>
										<?php
									}
									?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<?php
								if(count($get_product)>0)
								{
							?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<!--Breadcum-->
								<div class="bread-head">
									<div class="bread-title">
										<a class="bread-name">Home</a> >
									</div>
									<div class="bread-title">
										<a class="bread-name">category Name</a>
									</div>
									<br/>
									<h1 class="category-name" style="">Product Name</h1>
									<span>(Showing 1 – 40 products of 22,068 products)</span>
								</div>
								<!--Breadcum-->
								<div style="padding: 0px 9px 9px 12px;background-color: #fff;padding-top: 7px;">
									<!--<ul class="nav nav-tabs" id="myTab" role="tablist" >
										<h6 style="font-size:17px;font-weight:400;margin:9px;color:#495057;"><i class="fa fa-filter"></i> Sort By</h6>
									 <li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#Popularity" role="tab" aria-controls="home" aria-selected="true">Popularity</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#pice-low-to-high" role="tab" aria-controls="profile" aria-selected="false">Price-Low to High</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#pice-high-to-low" role="tab" aria-controls="contact" aria-selected="false">Price-High to Low</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" id="newset-tab" data-toggle="tab" href="#newest" role="tab" aria-controls="contact" aria-selected="false">Newest First</a>
									  </li>

									</ul>
									<div class="tab-content" id="myTabContent">
									<!--Popularity-->
									  <div class="tab-pane fade show active" id="Popularity" role="tabpanel" aria-labelledby="home-tab">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
												<!---->
													<?php 
															
															//print_r($get_product);
															foreach($get_product as $list)
															{
															 ?>
													<div class="col-md-3" style="width:25%;">
														<div style="padding: 16px;position: relative;transition: box-shadow .2s ease-in-out;-webkit-filter: none!important;filter: none!important :hover:box-shadow:0 3px 16px 0 rgba(0,0,0,.11);">
															<a style="position: relative;display: block; margin-bottom: 5px;" href="product.php?id=<?php echo $list['prod_id'];?>">
																<div style="height: 280px;width: 200px;position: relative;margin: 0 auto;">
																	<img src="uploads/<?php echo $list['img_thumb'];?>" alt="product images" style="position: absolute;bottom: 0;left: 0;right: 0;top: 0;max-width: 100%;max-height: 100%;">
																</div>
																<div style="position: absolute;display: inline-block;top: 12px;right: 12px;cursor: pointer;">
																	<div style="position: relative;display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;">
																		
																	</div>
																</div>
															</a>
															<a style="display: block;padding: 0 10px 0 0;margin: 3px 0;"><?php echo $list['prod_name'];?></a>
															<div style="color: #878787;font-size: 12px;padding-bottom: 5px;word-wrap: break-word;">
																pack of 2
															</div>
															<a style="display: block;padding: 0 10px 0 0;margin: 3px 0;">
																<div style="display: inline-block;font-size: 16px;font-weight: 500;color: #212121;">
																	<?php echo $list['oriprice'];?>
																</div>
																<div style="display: inline-block;margin-left: 8px;text-decoration: line-through;font-size: 14px;color: #878787;">
																<?php echo $list['sellprice'];?>
																</div>
																<div style="color: #388e3c;font-size: 13px;letter-spacing: -0.2px;font-weight: 500;display: inline-block;">
																	<span>50% off</span>
																</div>
															</a>
															<div style="color: #000000;font-size: 14px;font-family: inherit;font-weight: normal;    display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;vertical-align: middle;">No Cost EMI
															</div>
														</div>
													</div>
														<?php
														}
													?>
													<!---->
												</div>
											</div>
										</div>
									  </div>
									  <!--Popularity-->
									  <!--Price low to- high -->
									  <div class="tab-pane fade" id="pice-low-to-high" role="tabpanel" aria-labelledby="profile-tab">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-3">
														<a href="product-details.html">
															<img src="css/product-grid/images/product/1.jpg" alt="product images" width="100%">
														</a>	
													</div>
													<div class="col-md-3">
													<a href="product-details.html">
														<img src="css/product-grid/images/product/1.jpg" alt="product images" width="100%">
													</a>	
													</div>
													<div class="col-md-3">
														<a href="product-details.html">
															<img src="css/product-grid/images/product/1.jpg" alt="product images" width="100%">
														</a>	
													</div>
													<div class="col-md-3">
														<a href="product-details.html">
															<img src="css/product-grid/images/product/1.jpg" alt="product images" width="100%">
														</a>	
													</div>
													<div class="col-md-3">
														<a href="product-details.html">
															<img src="css/product-grid/images/product/1.jpg" alt="product images" width="100%">
														</a>	
													</div>
												</div>
											</div>
										</div>
									  </div>
									  <!--Price high to low -->
									  <div class="tab-pane fade" id="pice-high-to-low" role="tabpanel" aria-labelledby="contact-tab">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													
													
													
													
													<div class="col-md-3" style="width:25%;">
														<div style="padding: 16px;position: relative;transition: box-shadow .2s ease-in-out;-webkit-filter: none!important;filter: none!important :hover:box-shadow:0 3px 16px 0 rgba(0,0,0,.11);;">
																
															<a style="position: relative;display: block; margin-bottom: 5px;">
																<div style="height: 280px;width: 200px;position: relative;margin: 0 auto;">
																	<img src="css/product-grid/images/product/1.jpg" alt="product images" style="position: absolute;bottom: 0;left: 0;right: 0;top: 0;max-width: 100%;max-height: 100%;">
																</div>
																<div style="position: absolute;display: inline-block;top: 12px;right: 12px;cursor: pointer;">
																	<div style="position: relative;display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;">
																		
																	</div>
																</div>
															</a>
															<a style="display: block;padding: 0 10px 0 0;margin: 3px 0;">Product Name</a>
															<div style="color: #878787;font-size: 12px;padding-bottom: 5px;word-wrap: break-word;">
																pack of 2
															</div>
															<a style="display: block;padding: 0 10px 0 0;margin: 3px 0;">
																<div style="display: inline-block;font-size: 16px;font-weight: 500;color: #212121;">
																	$199
																</div>
																<div style="display: inline-block;margin-left: 8px;text-decoration: line-through;font-size: 14px;color: #878787;">
																$399
																</div>
																<div style="color: #388e3c;font-size: 13px;letter-spacing: -0.2px;font-weight: 500;display: inline-block;">
																	<span>50% off</span>
																</div>
															</a>
															<div style="color: #000000;font-size: 14px;font-family: inherit;font-weight: normal;    display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;vertical-align: middle;">No Cost EMI
															</div>
														</div>
													</div>
													<div class="col-md-3" style="width:25%;">
														<div style="padding: 16px;position: relative;transition: box-shadow .2s ease-in-out;-webkit-filter: none!important;filter: none!important :hover:box-shadow:0 3px 16px 0 rgba(0,0,0,.11);;">
																
															<a style="position: relative;display: block; margin-bottom: 5px;">
																<div style="height: 280px;width: 200px;position: relative;margin: 0 auto;">
																	<img src="css/product-grid/images/product/1.jpg" alt="product images" style="position: absolute;bottom: 0;left: 0;right: 0;top: 0;max-width: 100%;max-height: 100%;">
																</div>
																<div style="position: absolute;display: inline-block;top: 12px;right: 12px;cursor: pointer;">
																	<div style="position: relative;display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;">
																		
																	</div>
																</div>
															</a>
															<a style="display: block;padding: 0 10px 0 0;margin: 3px 0;">Product Name</a>
															<div style="color: #878787;font-size: 12px;padding-bottom: 5px;word-wrap: break-word;">
																pack of 2
															</div>
															<a style="display: block;padding: 0 10px 0 0;margin: 3px 0;">
																<div style="display: inline-block;font-size: 16px;font-weight: 500;color: #212121;">
																	$199
																</div>
																<div style="display: inline-block;margin-left: 8px;text-decoration: line-through;font-size: 14px;color: #878787;">
																$399
																</div>
																<div style="color: #388e3c;font-size: 13px;letter-spacing: -0.2px;font-weight: 500;display: inline-block;">
																	<span>50% off</span>
																</div>
															</a>
															<div style="color: #000000;font-size: 14px;font-family: inherit;font-weight: normal;    display: -webkit-inline-flex;display: -ms-inline-flexbox;display: inline-flex;vertical-align: middle;">No Cost EMI
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									  </div>
									  <div class="tab-pane fade" id="newest" role="tabpanel" aria-labelledby="newset-tab">
											<div class="col-md-3">
												<a href="product-details.html">
													<img src="css/product-grid/images/product/1.jpg" alt="product images">
												</a>	
											</div>
									  </div>
									</div>-->
								</div>
								
							</div>
							<?php 
								}
								else
								{
								?>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div style="background: #fff;padding: 12px 13px 0;border-bottom: 1px solid #f0f0f0;/*height: 100%;*/min-height: 42px;">
											<h1 style="text-align:center;">Data Not Found</h2>	
										</div>
									</div>
								<?php
									
								}
							?>	
						</div>
					</div>
				</div>
			</div>
		</div>
		




















    <!-- Body main wrapper start -->
    <div class="wrapper">
        
        <div class="body__overlay"></div>
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                </div>
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        
                                        <!-- Start Single Product -->
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.html">
                                                        <img src="css/product-grid/images/product/1.jpg" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html">Largest Water Pot</a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize">$30.3</li>
                                                        <li>$25.9</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
										<!-- Start Single Product -->
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.html">
                                                        <img src="css/product-grid/images/product/1.jpg" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html">Largest Water Pot</a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize">$30.3</li>
                                                        <li>$25.9</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
										<!-- Start Single Product -->
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.html">
                                                        <img src="css/product-grid/images/product/1.jpg" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html">Largest Water Pot</a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize">$30.3</li>
                                                        <li>$25.9</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
										
										<!-- Start Single Product -->
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product-details.html">
                                                        <img src="css/product-grid/images/product/1.jpg" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html">Largest Water Pot</a></h4>
                                                    <ul class="fr__pro__prize">
                                                        <li class="old__prize">$30.3</li>
                                                        <li>$25.9</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">
                                                <!-- Start List Product -->
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                        <a href="product-details.html"><img src="css/product-grid/images/product-2/pro-1/1.jpg" alt="product images"></a>
                                                    </div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="product-details.html">Product Title Here </a></h2>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize">$82.5</li>
                                                            <li>$75.2</li>
                                                        </ul>
                                                        <ul class="rating">
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                        </ul>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End List Product -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        
        <!-- End Banner Area -->
        
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="CSS/product-grid/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="CSS/product-grid/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <!--<script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>-->
    <!-- Waypoints.min.js. -->
    <!--<script src="js/waypoints.min.js"></script>-->
    <!-- Main js file that contents all jQuery plugins activation. -->
    <!--<script src="js/main.js"></script>-->

</body>

</html>