<?php
	require('./functions/functions.php');
	$sort_order = '';
	  $price_low_selected = '';	
	  $price_high_selected = '';	
	  $new_selected = '';	
	  $old_selected = '';	
	
	if(isset($_GET['sort']))
	{
		$sort = mysqli_real_escape_string($conn,$_GET['sort']);
		if($sort=="price_low")
		{
			$sort_order = " order by products.sellprice asc ";
			$price_low_selected = "selected";
		}
		else if($sort=="price_high")
		{
			$sort_order = " order by products.sellprice desc ";
			$price_high_selected = "selected";
		}
		else if($sort=="new")
		{
			$sort_order = " order by products.prod_id desc ";
			$new_selected = "selected";
		}
		else if($sort=="old")
		{
			$sort_order = " order by products.prod_id asc";
			$old_selected = "selected";
		}
	}
	if(isset($_GET['id']) && $_GET['id']!='')
	{
		
		$cat_id = mysqli_real_escape_string($conn,$_GET['id']);
		if($cat_id>0)
		{
			$get_product = get_product($conn,'',$cat_id,'','',$sort_order);
		}
		else
		{
			header("Location:index.php");
		}
	}
	else
	{
		header("Location:index.php");
	}
	include('inc/header.php');
	include('inc/head.php');
?>
	
	<style>
	body{
		background: #F1F3F6 !important;	
	}	
	</style>
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
										<a class="bread-name"><?php echo $get_product['0']['category_name'];?></a>
									</div>
									<br/>
									<h1 class="category-name"><?php echo $get_product['0']['category_name'];?></h1>
									<span class="" style="">(Showing 1 – 40 products of 22,068 products)</span>&nbsp;&nbsp;&nbsp;&nbsp;
									<select style="align:justify;width:25%;" onchange="sort_product_drop(<?php echo $cat_id;?>)" id="sort_product_id">
											<option value="">Default Softing</option>
											<option value="price_low" <?php echo $price_low_selected?>>Sort by Price low to high</option>
											<option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low</option>
											<option value="new" <?php echo $new_selected?>>Sort by New first</option>
											<option value="old" <?php echo $old_selected?>>Sort by old first</option>
									</select>
								</div>
								<!--Breadcum-->
								<div style="padding: 0px 9px 9px 12px;background-color: #fff;padding-top: 7px;">
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
																	<?php echo $list['sellprice'];?>
																</div>
																<!--<div style="display: inline-block;margin-left: 8px;text-decoration: line-through;font-size: 14px;color: #878787;">
																<?php echo $list['oriprice'];?>
																</div>-->
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
									  </div>
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
	</div>
<?php 
	include('inc/footer.php');
	include('inc/script.php');
?>
