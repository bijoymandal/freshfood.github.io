<?php 	
//include_once('connection.php');
require_once 'connection.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$ctegory_id 		= $_POST['category_id'];
	$productName 		= $_POST['productName'];
  //$productImage 	= $_POST['productImage'];
  $productdesc 	= $_POST['productDesc'];
  $quantity 			= $_POST['qty'];
  $unit 			= $_POST['prodUnit'];
  $oprice 					= $_POST['oprice'];
  $sprice 					= $_POST['sprice'];
  $supid 			= $_POST['sup_id'];
  $productStatus 	= $_POST['prodStatus'];

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];		
	$url = '../uploads/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) 
	{
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) 
		{
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) 
			{
				$sql = "INSERT INTO products (category_id,prod_name,img_thumb,prod_desc,pqty,punit,oriprice,sellprice,selleid,active) 
				VALUES ('$ctegory_id','$productName', '$url','$productdesc', '$quantity', '$unit', '$oprice', '$sprice', '$supid', '$productStatus')";
				$result = mysqli_query($conn,$sql);
				if($result === TRUE)
				{
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
				}
				else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}	
			}
			else
			{
				return false;
			}				
		}			
	}
	echo json_encode($valid);
} // /if $_POST

	