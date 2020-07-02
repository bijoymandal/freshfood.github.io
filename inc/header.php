<?php 
	if(isset($_GET['id']) && $_GET['id']!='')
	{ 										  
		$product_id = mysqli_real_escape_string($conn,$_GET['id']);
		//print_r($product_id);
		$product_meta_res=mysqli_fetch_assoc(mysqli_query($conn,"select * from `products` where prod_id='$product_id'"));
		//print_r($product_meta_res);
		$meta_title = $product_meta_res['meta_title'];		
		$meta_keywords = $product_meta_res['meta_keyword'];		
		$meta_description = $product_meta_res['meta_description'];		
	}

?>



<!DOCTYPE html>
<html>
<head>
	<title><?=$meta_title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?=$meta_description?>">
	<meta name="Keyword" content="<?=$meta_description?>">
	
	<!--<link rel="stylesheet" href="CSS\Bootstrap\style.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--<link href="CSS\jquery\style.css">-->
	<link rel="stylesheet" type="text/css" href="CSS\font\style.css">
	<link rel="stylesheet" type="text/css" href="CSS\style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
	<!--product grid-->
    <!-- Bootstrap fremwork main css -->
    <!--<link rel="stylesheet" href="CSS/product-grid/css/bootstrap.min.css">-->
	<!--<link rel="stylesheet" href="CSS/product-grid/css/core.css">-->
	<!-- Theme shortcodes/elements style -->
    <!--<link rel="stylesheet" href="CSS/product-grid/css/shortcode/shortcodes.css">-->
    <!-- Theme main style -->
    <!--<link rel="stylesheet" href="CSS/product-grid/product-grid.css">-->
    <!-- Responsive css -->
    <!--<link rel="stylesheet" href="CSS/product-grid/css/responsive.css">-->
    
</head>