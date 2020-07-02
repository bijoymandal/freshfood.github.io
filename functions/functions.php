<?php
	require('connection.php');
	$valid['success'] = array('success' => false, 'messages' => array());
	/*$units = array(
		1 => "Gm",
		2 => "Kg",
		3 => "Pcs",
		4 => "Ltr",
	);*/
	/*Add category*/
	function addcategory($cat_name,$cat_status)
	{
		global $conn;
		$sql = "SELECT * FROM `category` where category_name ='".$cat_name."' and parent_id=0 and category_status = '".$cat_status."'";
		$result = mysqli_query($conn,$sql);
		$check = mysqli_num_rows($result);
		if($check>0)
		{
			echo "already exists";
		}
		else{
			$sql = "INSERT INTO `category`(category_name,category_status) values('$cat_name','$cat_status')";
			if(mysqli_query($conn,$sql)){
				return mysqli_insert_id($conn);
			}else{
				return false;
			}
		}
	}
	/*edit category*/
	function getcategorydetail($cat_id)
	{
		global $conn;
		$query = "SELECT * FROM `category` where category_id='".$cat_id."' and parent_id=0";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0)
		{
			while($rows = mysqli_fetch_assoc($result))
			{
				return $rows;
			}
			
		}
	}
	/*Update category*/
	function updatecategorydetail($cat_id, $cat_name, $cat_status)
	{		
		global $conn;
		$sql = "SELECT * FROM `category` where category_name = '".$cat_name."' and parent_id=0";
		$result = mysqli_query($conn,$sql);
		$check = mysqli_num_rows($result);
		if($check >0){
			echo "already exists";
		}
		else{
			$sql = "UPDATE `category` SET category_name = '".$cat_name."', category_status='".$cat_status."' WHERE `category_id` = '".$cat_id."'"; 
			return mysqli_query($conn,$sql); 
		}
	}
	/*Delete Category*/
	function deletecategory($cat_id)
	{	
		global $conn;
		echo $sql ="DELETE from `category` where `category_id`='$cat_id'";
		mysqli_query($conn,$sql);
		return true;
	}
	/*Active category*/
	function activecategory($ID, $status)
	{
		global $conn;
		$sql = "update category set category_status='".$status."' where category_id = '".$ID."'";
		return mysqli_query($conn,$sql);	
	}
	/*get category*/
	function getcategory()
	{
		global $conn;
		$sql = "SELECT * from `category` where category_id!=0";
		$result = mysqli_query($conn,$sql);
		if(!empty($result))
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$cats[] = $row;
			}
			return $cats;
		}
		else
		{
			return false;
		}
	}
	/*Add sub category*/
	function getSubCategories($par_id, $cat_name, $cat_status){
		global $conn;
		$sql = "INSERT INTO `category`(parent_id,category_name,category_status) values('$par_id','$cat_name','$cat_status')";
		if(mysqli_query($conn,$sql)){
			return mysqli_insert_id($conn);
		}else{
			return false;
		}	
	}
	/*Active and Inactive each item selected*/
	function getCategories(){
		
		global $conn;
		$sql = "SELECT * FROM `category` where category_status=1";
		$result = mysqli_query($conn,$sql);
		if(!empty($result))
		{
			while($row = mysqli_fetch_array($result))
			{
				$cats[] = $row;
			}
			return $cats;
		}else{
			echo "not found";
			return;	
		}
	}
	/*select product page search subcategory*/
	function getSubCategoriesByCatID($catID){
		global $conn;
		$sql = "SELECT * FROM `category` WHERE `parent_id`='$catID'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_array($result))
			{
				$cats[] = $row;
			}
			return $cats;
		}else{
			return false;
		}
	}
	/*Edit subcategory*/
	function subcategorydetails($Subid)
	{
		global $conn;
		$query = "SELECT * FROM `category` where category_id='".$Subid."'";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0)
		{
			while($rows = mysqli_fetch_assoc($result))
			{
				$output['category_id'] = $rows['category_id'];
				$output['category_name'] = $rows['category_name'];
				$output['brand_select_box'] = getupdcategory ($rows['parent_id']);
				$output['category_status'] = $rows['category_status'];
			}
			return $output;
		}
	}
	/*update subcategory*/
	function getupdcategory($categoryid){
		global $conn;
		$sql = "SELECT * from `category` where category_id = '.$categoryid.'";
		$result = mysqli_query($conn,$sql);
		$output ='';
		while($row = mysqli_fetch_assoc($result))
		{
			$output .= '<option value="'.$row["parent_id"].'">'.$row["category_name"].'</option>';
			//return $output;
		}
		return $output;
	}
	/*Delete subcategory*/
	function deletesubgategory($Sub_id)
	{
		global $conn;
		$query = "DELETE FROM `category` where category_id='$Sub_id'";
		mysqli_query($conn,$query);
		return true;
	}
		/*Add product*/
	function addproducts($cat_id,$product_name,$product_desc,$prod_qty,$prod_unit,$prod_ori_price,$prod_sell_price,$supplier_id,$prod_status)
	{
		global $conn;
		$sql = "SELECT * from products where prod_name='$product_name'";
		$result = mysqli_query($conn,$sql);
		$pcheck = mysqli_num_rows($result);
		if(!empty($pcheck)){
			
			echo "already Exists";	
		}
		else{
					$type = explode('.', $_FILES['productImage']['name']);
					$type = $type[count($type)-1];		
					$url = '../uploads/'.uniqid(rand()).'.'.$type;
			    //$img = $_FILES['productImage']['name'];  
				$imgupoad = move_uploaded_file($_FILES['productImage']['tmp_name'],$url);
				echo $sql = "INSERT INTO `products`(category_id,prod_name,prod_desc,pqty,punit,oriprice,sellprice,selleid,active,img_thumb) 
				values('$cat_id','$product_name','$product_desc','$prod_qty','$prod_unit','$prod_ori_price','$prod_sell_price','$supplier_id','$prod_status','$url')";
				$res = mysqli_query($conn,$sql);
				return $res; 	
		}
	}

	/*Edit product*/
	         			
	function getproductdetail($prod_id){
		global $conn;
		$sql = "select * from `products` where prod_id='".$prod_id."'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				return $row;	
			}
		}
	}
	/*update product*/
	function updproducts($prod_id, $cat_id, $prodname, $prodesc, $pqty, $punit, $oprice, $sprice, $supid, $sactive)
	{
		global $conn;
		$sql = "SELECT * FROM `products` where prod_name = '$prodname'";
		$result = mysqli_query($conn,$sql);
		$check = mysqli_num_rows($result);
		if($check >0){
			echo "already exists";
		}
		else
		{
			echo $sql = "UPDATE `products` SET category_id = '$cat_id', prod_name='$prodname', prod_desc = '$prodesc', pqty = '$pqty', punit= '$punit', oriprice = '$oprice',sellprice = '$sprice', selleid = '$supid', active ='$sactive' WHERE prod_id = '$prod_id'";
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
			echo json_encode($valid);	
		}
	}
	
	//update image product // not completed
	function updimage($prod_id)
	{
		global $conn;
		$type = explode('.', $_FILES['editProductImage']['name']);
		$type = $type[count($type)-1];		
		$url = '../uploads/'.uniqid(rand()).'.'.$type;
		if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
			if(is_uploaded_file($_FILES['editProductImage']['tmp_name'])) {			
				if(move_uploaded_file($_FILES['editProductImage']['tmp_name'], $url)) {

					$sql = "UPDATE products SET img_thumb = '$url' WHERE prod_id = '$prod_id'";				
					$result = mysqli_query($conn,$sql);	
					if($result === TRUE) {									
						$valid['success'] = true;
						$valid['messages'] = "Successfully Updated";	
					} else {
						$valid['success'] = false;
						$valid['messages'] = "Error while updating product image";
					}
				}	
				else 
				{
					return false;
				}	// /else	
			} // if
		} // if in_array 		
		echo json_encode($valid);
	}
	/*Delete product*/
	function deleteproduct($prod_id)
	{
		global $conn;
		$sql = "DELETE from `products` where `prod_id`='$prod_id'";
		mysqli_query($conn,$sql);
		return;
	}
	/*Details product*/
	function detailproduct($detail_id)
	{
		global $conn;
		$sql = "SELECT * FROM products as p
			INNER JOIN category as b ON b.category_id = p.category_id 
			INNER JOIN supplier as s ON s.sup_id = p.selleid 
			WHERE p.prod_id = '".$detail_id."'";
		$productdetails = '';
		$productresult = mysqli_query($conn,$sql);
		$productDetails = '<div class="table-responsive">
				<table class="table table-boredered">';
		
		while($product = mysqli_fetch_assoc($productresult))
		{
			$productDetails .= '
								<tr>
									<td>Category Name</td>
									<td>'.$product["category_name"].'</td>
								</tr>
								<tr>
									<td>Product Name</td>
									<td>'.$product["prod_name"].'</td>
								</tr>
								<tr>
									<td>Product Description</td>
									<td>'.$product["prod_desc"].'</td>
								</tr>
								<tr>
									<td>Available Quantity</td>
									<td>'.$product["pqty"].' '.$product["punit"].'</td>
								</tr>
								<tr>
									<td>Product Origianl price</td>
									<td>'.$product["oriprice"].'</td>
								</tr>
								<tr>
									<td>Product Selling price</td>
									<td>'.$product["sellprice"].'</td>
								</tr>
								<tr>
									<td>Purchase product Date</td>
									<td>'.$product["purchase_date"].'</td>
								</tr>
								<tr>
									<td>Supplier Name</td>
									<td>'.$product["supplier_name"].'</td>
								</tr>
								';	
		}		
		$productDetails .= '
			</table>
		</div>
		';
		echo $productDetails;
		return;	
	}
	/*Add supplier*/
	function addsupplier($supplier_name,$supp_ph,$supp_add,$supplier_status)
	{
		global $conn;
		$sql = "INSERT INTO `supplier`(supplier_name,phone,address,status) values('$supplier_name','$supp_ph','$supp_add','$supplier_status')";
		$result = mysqli_query($conn,$sql);
		return $result;
	}
	
	/*Edit Supplier*/
	function getsupplierdetail($sup_id)
	{
		global $conn;
		$query = "SELECT * FROM `supplier` where sup_id='".$sup_id."'";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0)
		{
			while($rows = mysqli_fetch_assoc($result))
			{
				return $rows;
			}
		}
	}
	
	/*update supplier*/
	function updatesupplierdetail($sup_id, $sup_name, $sup_ph, $sup_add, $sup_status)
	{		
		global $conn;
		$sql = "UPDATE `supplier` SET supplier_name = '".$sup_name."', phone ='".$sup_ph."', address='".$sup_add."',status='".$sup_status."' WHERE `sup_id` = '".$sup_id."'";
		echo $sql;	
		return mysqli_query($conn,$sql);
	}
	/*Active supplier */
	function activesupplier($ID, $status)
	{
		global $conn;
		$sql = "update supplier set status='".$status."' where sup_id = '".$ID."'";
		mysqli_query($conn,$sql);
		return true;	
	}
	/*Active and Inactive supplier name*/
	function selectSupplier()
	{
		global $conn;
		$sql = "SELECT * from `supplier` where status=1";
		$result = mysqli_query($conn,$sql);
		if(!empty($result))
		{
			while($row = mysqli_fetch_array($result))
			{
				$sup[] = $row;
			}
			return $sup;
		}else{
			return false;
		}
	}
	/*Delete Supplier*/
	function deletesupplier($sup_id)
	{	
		global $conn;
		$sql ="DELETE from `supplier` where `sup_id`='$sup_id'";
		mysqli_query($conn,$sql);
		return true;
	}
	/*Delete Customer*/
	function deletecustomer($cust_id)
	{
		global $conn;
		$sql = "DELETE from `supplier` where `sup_id`='$cust_id'";
		mysqli_query($conn,$sql);
		return;
	}
	
	// add to cart
	/*function getproductid($cart_id,$prod_value,$prod_unit,$prod_qty)
	{
		global $conn;
		$sql = "SELECT * FROM products WHERE product_code='$cart_id' LIMIT 1";
		print_r($sql);
		$result = mysqli_query($conn,$sql);
    	while($rows = mysqli_fetch_array($result))
		{
			$products[] = $rows;
		}
		//print_r($products);
		foreach($products as $product_item)
		{
			//print_r($product_item);
			$added_item["prod_name"] = $product_item['prod_name'];
			
			$added_item["sellprice"] = $product_item['sellprice'];	
	
			$_SESSION["products"] = $added_item;
		}
		echo(json_encode(array('add_items_incart'=>count($_SESSION['products']))));
	}*/
	/*function getproductid($cart_id)
	{
		global $conn;
		$query = "SELECT prod_name , sellprice FROM products WHERE prod_id='".$cart_id."'";
		$result = mysqli_query($conn,$query);
		while($row = mysqli_fetch_assoc($result))
		{
			foreach($row as $key =>$value)
			{
				$product[$key] = filter_var($value, FILTER_SANITIZE_STRING); 
				echo $product[$key];
			}
			if(isset($_SESSION['products']))
			{
				if(isset($_SESSION['products'] ['prod_id']))
				{
					//echo"($_SESSION['products'] [$new_product['prod_id']])";
					unset($_SESSION['products']['prod_id']);
				}
			}
			$_SESSION['products']['prod_id'] = $product;
			//return $product;		
		}
		$total_items = count($_SESSION['products']);
		//echo "$total_items";
		die(json_encode(array('items'=>$total_items)));
	}*/
	
	
	//view cart list
	if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
	{
		if(isset($_SESSION["products"]) && count($_SESSION["products"])>0)
		{ //if we have session variable
			echo ($_SESSION["products"]);
		}
		else
		{
			die("Your Cart is empty"); //we have empty cart
		}
	}
	
	
	

	
	
	
	
	
	
	
	
	
	/*add inventory*/
	/*function addinventory($prodname,$pqty,$punit,$oriprice,$sellprice,$supname){
		global $conn;
		$sql = "INSERT into `inventory`(product_name,qty,punit,oprice,sprice,sup_id)VALUES('$prodname','$pqty','$punit','$oriprice','$sellprice','$supname')";
		return mysqli_query($conn,$sql);

	}*/
	/*Add Stock*/
	/*function addstock($cat_id,$prod_name,$upload,$prod_desc,$prod_qty,$prod_unit,$Oprice,$Sprice,$sup_name,$stactive)
	{
		global $conn;
		$sql = "INSERT into `stock`(category_id ,prod_name,img_thumb,prod_desc,prod_qty,p_unit,actprice,sellprice,sup_id,prodstatus)VALUES('$cat_id','$prod_name','$upload','prod_desc','$prod_qty','$prod_unit','$Oprice','$Sprice','$sup_name','stactive')";
		if(mysqli_query($conn,$sql)){
			return mysqli_insert_id($conn);
		}else{
			return false;
		}
	}
	*/
	
	/*select category name product page*/
	function getcategoryname($catID)
	{
		global $conn;
		$sql = "select category_name from `category` where category_id = '".$catID."';";
		$result = mysqli_query($conn,$sql);
		$cat = mysqli_fetch_assoc($result);
		return $cat;
	}

	/*Delete Stock*/
	/*function deletestock($stock_id)
	{
		global $conn;
		$sql ="DELETE from `stock` where `s_id`='$stock_id'";
		mysqli_query($conn,$sql);
		return true;
	}
	*/
	/*Details Stock*/
	function detailstock($detail_id)
	{
		global $conn;
		$sql = "select * from `stock` where s_id ='.$detail_id.'";
		$stockresult = mysqli_query($conn,$sql);
		$stockdetails = '<div class="table-responsive">
		<table class="table table-boredered">';
		if(mysqli_num_rows($stockresult)>0)
		{
			while ($row = mysql_fetch_assoc($stockresult, MYSQLI_ASSOC)) 
			{
				$stockdetails .= '
					<tr>
						<td>Category Name</td>
						<td>'.$row['category_id'].'</td>
					</tr>
					<tr>
						<td>Product Name</td>
						<td>'.$row['prod_name'].'</td>
					</tr>
					<tr>
						<td>Image</td>
						<td>'.$row['img_thumb'].'</td>
					</tr>
					<tr>
						<td>Product Description</td>
						<td>'.$row['prod_desc'].'</td>
					</tr>
					<tr>
						<td>Product Quantity</td>
						<td>'.$row['prod_qty'].'</td>
					</tr>
					<tr>
						<td>Original Price</td>
						<td>'.$row['actprice'].' '.$row['p_unit'].'</td>
					</tr>
					<tr>
						<td>Sell Price</td>
						<td>'.$row['sellprice'].'</td>
					</tr>
					<tr>
						<td>Prachase Date</td>
						<td>'.$row['purchase_date'].'</td>
					</tr>
				';
			}
		}
		$stockdetails .='</table></div>';
		echo $stockdetails;	
	}
	
	//
	function productstockdetails($sttocart_id)
	{
		global $conn;
		$sql ="SELECT * FROM stock s INNER JOIN category c ON s.category_id = c.category_id where s_id ='$sttocart_id'";
		//$sql = "select * from stock where s_id ='.$sttocart_id.'";
		$prodresult = mysqli_query($conn,$sql);
		if(mysqli_num_rows($prodresult)>0)
		{
			while($row = mysqli_fetch_assoc($prodresult))
			{
				$cart_data[] = $row;
			}
			return $cart_data;
		}
	}
	//sign up
	/*function addusersignup($uname,$uemail,$upass)
	{
		global $conn;
		if($uname == "" || $uemail== "" || $upass == "")
		{
			echo "please fill up all fields";
		}
		else
		{
			$pass = password_hash($upass, PASSWORD_BCRYPT);
			//$token = bin2hex(random_bytes(15));
			$emailquery = "select * from `users` where email = '$uemail'";
			$query = mysqli_query($conn,$emailquery);
			$emailcount = mysqli_num_rows($query);
			if($emailcount>0)
			{
				return;
			}
			else
			{
				$insertquery = "INSERT INTO `users`(username,email,password)VALUES('$uname','$uemail','$pass')";
				$result = mysqli_query($conn,$insertquery);
				if($result)
				{
					$subject = "Email Activation";
					$body = "Hi, $uname. Click here too activate your account 
					http://localhost/stadmin/activate.php?token=$token";
					$sender_email = "From:bijoymandal00@gmail.com";
					if (mail($email, $subject, $body, $sender_email)) 	
					{
						return true;	
					}
					else
					{
						echo "failed to message send";
					}
					echo "successfullt Email Send";
				}
				else
				{
					echo "email not sending";
				}
			}	
		}	
	}
	*/
	//banner image 
	function fetch_image()
	{
		global $conn;
		$query = "SELECT * FROM banner ORDER BY id DESC";
		$result = mysqli_query($conn, $query);
		$output = '';
		if(mysqli_num_rows($result)>0)
		{
			$number = 1;
			$output = '
					<table class="table table-bordered table-striped">  
					<tr>
					 <th width="10%">ID</th>
					 <th width="70%">Image</th>
					 <th width="10%">Change</th>
					 <th width="10%">Remove</th>
					</tr>';
		  while($row = mysqli_fetch_array($result))
		  {
			   $output .= '
				<tr id="'.$row["id"].'">
				 <td class="name">'.$number.'</td>
				 <td>
				  <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="60" width="75" class="img-thumbnail" />
				 </td>
				 <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["id"].'">Change</button></td>
				 <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">Remove</button></td>
				</tr>
			   ';
			   $number++;
			  }
		}
		else{
			echo "Data not Found";
		}
		  $output .= '</table>';
		  echo $output;
	}
	//banner image upload
	function add_image($file)
	{
		global $conn;
		$filename = addslashes(file_get_contents($_FILES[$file]["tmp_name"]));
		$query = "INSERT INTO banner(name) VALUES ('$filename')";
		if(mysqli_query($conn, $query))
		{
			echo 'Image Inserted into Database';
		}
	}
	//banner slider indicator
	function make_query($conn){
        global $conn;
		$query = "SELECT * FROM banners ORDER BY banner_id ASC";
        $result = mysqli_query($conn,$query);
        return $result;
    }
	function make_slide_indicators($conn){
        $output = '';
        $count = 0;
        $result = make_query($conn);
        while($row = mysqli_fetch_array($result)){
            if($count ==0){
                $output.= '<li data-target="#slider" data-slide-to="'.$count.'" class="active"></li>';
            }
            else{
                $output.='<li data-target="#slider" data-slide-to="'.$count.'"></li>';
            }
            $count++;
        }
        return $output;
    }
	//banner image preview
	function make_slides($conn)
	{
		$output= '';
		$count = 0;
		$result = make_query($conn);
		while($row = mysqli_fetch_array($result))
		{
			if($count == 0)
			{
				$output.='<div class="carousel-item active">';
			}
			else
			{
				$output.='<div class="carousel-item">';
			}
			$output.= '<img class="d-block w-80 h-50" src="img/banner/'.$row['banner_image'].'" alt="'.$row['banner_title'].'" width="100%" height="80%">
			</div>';
			$count++;
		}
		return $output;
	}
	//getproduct category id
	function get_product($conn,$limit='',$cat_id='',$product_id='',$search_str='',$sort_order='')
	{
		global $conn;
		$sql = "SELECT products.*,category.category_name from products,category where products.active=1";
		if($cat_id!='')
		{
			$sql.=" and products.category_id ='$cat_id'";
		}
		if($product_id!='')
		{
			$sql.=" and products.prod_id ='$product_id'";
		}
		$sql.=" and products.category_id =category.category_id";
		if($search_str!='')
		{
			$sql.=" and (products.prod_name like '%$search_str%' or products.prod_desc like '%$search_str%')";
		}
		if($sort_order!='')
		{
			$sql.=$sort_order;
		}
		else{
			$sql.=" order by products.prod_id desc";	
		}
		if($limit!='')
		{
			$sql.=" limit $limit"; 
		}
		//echo $sql;
		$result = mysqli_query($conn,$sql);
		$data = array();
		while($row = mysqli_fetch_array($result))
		{
			$data[] = $row;	
		}
		return $data;
	}
	
	function userregiester($uname,$pass,$phone,$email)
	{
		global $conn;
		$user = mysqli_real_escape_string($conn,$uname);
		$password = mysqli_real_escape_string($conn,$pass);
		$mobile = mysqli_real_escape_string($conn,$phone);
		$EId = mysqli_real_escape_string($conn,$email);
		
		$pass = password_hash($password ,PASSWORD_BCRYPT);
		$sql = "SELECT * from customer where email='$EId'";
		$res = mysqli_query($conn,$sql);
		$emailcount = mysqli_num_rows($res);
		if($emailcount>0)
		{
			echo "Email exist";
		}
		else
		{
			$sql = "insert into customer(username,password,phone,email)values('$user','$password','$mobile','$EId')";
			return mysqli_query($conn,$sql);
			echo "insert";
		}
	}
	function userlogin($logemail,$logpass)
	{
		global $conn;
		$email = mysqli_real_escape_string($conn,$logemail);
		$password = mysqli_real_escape_string($conn,$logpass);
		
		$emailcheck ="SELECT * from customer where email='$email'";
		$res = mysqli_query($conn,$emailcheck);
		$emailcount = mysqli_num_rows($res);
		if($emailcount>0)
		{
			$email_pass = mysqli_fetch_assoc($res);
			$db_pass = $email_pass['password'];	
			$pass_decode = password_verify($password, $db_pass);
			//echo "Email Id right";
			//return ;
			if($email_pass && $pass_decode)
			{
				$_SESSION['user_login'] = 'yes';
				$_SESSION['user_ID'] = $email_pass['id'];
				$_SESSION['user_name'] = $email_pass['username'];	
				echo "valid";
			}
		}
		else
		{
			echo "wrong";
		}
	}
	//ajax addtocart
	/*function addcartdetails($pid,$pqty)
	{
		global $conn;
		$added_item['prod_id'] = $pid;
		$added_item['qty'] = $pqty;
		$sql = "select * from products where prod_id = '$pid' LIMIT 1";
		$res = mysqli_query($conn,$sql);
		foreach($res as $item)
		{
			$added_item['prod_name']= $item['prod_name'];			
			$added_item["sellprice"] = $item['sellprice'];
			$added_item["img_thumb"] = $item['img_thumb'];
			
			$_SESSION["cart"][$added_item['prod_id']] = $added_item;        
		}
		exit(json_encode(array('items_in_cart'=>count($_SESSION['cart']))));
		return;
	}
	function loadcartdata()
	{
		global $conn;
		if(isset($_SESSION["cart"]) && count($_SESSION["cart"])>0)
		{
			$output = '';
			$output = '<ul class="shopping-cart-items">';
			$total = 0;
			foreach($_SESSION["cart"] as $items)
			{
				$output .= '<li class="flex-container clearfix">
								<div class="prod-img">
									<img src="<?php echo $items["img_thumb"];?>" alt="product_image" />
								</div>
								<div class="item-info">
									<div class="brand-name">
										<span style="font-size:10px;color:grey;">Fresh</span>
									</div>
									<div class="prod-name">
										<span style="font-size:12px;color:grey;font-weight:600;line-height:1px;"><?php echo $items["prod_name"];?></span>	
									</div>
									<div class="prod-value">
										<span style="font-size:12px;color:grey;line-height:3px;">Size <?php echo $items["pvalue"]?> &nbsp;<?php echo $items["punit"];?></span>	
									</div>
									<div style="font-size:10px;color:grey;line-height:25px;"><?php echo $items["product_qty"];?>.X.<?php echo $items["sellprice"];?>
									</div>
								</div>
								<div class="qty-btn">
									<a class="btn-minus subtract-cart-qty" data_code="<?php echo $items["prod_id"];?>"><i class="fa fa-minus"></i> </a>	
										<?php echo "<span class="quantity">".$items["product_qty"]."</span>"; ?>

									<a class="btn-minus btn-plus add-cart-qty" data_code="<?php echo $items["prod_id"];?>"><i class="fa fa-plus"></i> </a>
								</div>
								<div class="price-info">
									<div class="prod-price">Rs:<?php echo sprintf("%.2f",($items["sellprice"] * $items["product_qty"]));?></div>
									<div class="save-price">Saved Rs:26.00</div>
								</div>
								<div class="item-remove" style="float:right;cursor:pointer;">
									<a href="#" class="remove-item delete-cart" data-item-id="<?php echo $items["prod_id"];?>"><i class="fa fa-trash"></i></a>
								</div>
							</li>';
						$total += ($items['sellprice'] * $items['product_qty']);
					}
				$output.= '</ul>
						   <div class="cart-terms">
								<div class="terms">** Actual Delivery Charges computed at checkout <i class="fa fa-question-circle-o"></i> 
								</div>
							</div>
							<div class="cart-terms-chekout">
								<div class="checkout">
									<p>Sub Total 
										<span><?php echo "Rs.".sprintf("%.2f",$total);?></span>
									</p>
									<p>Delivery Charge 
										<span> Free </span>
									</p>
								</div>
								<a href="checkout.php" style="width:100%;"class="btn btn-success">Checkout</a>
							</div>'; 
		}
		else
		{
			echo ("your card is finished");
		}
	}
	*/
	
	/*function addProduct($pid,$qty)
	{
		$_SESSION['cart'][$pid]['qty'] = $qty;
	}
	function updateProduct($pid ,$qty)
	{
		if(isset($_SESSION['cart']['$pid']))
		{
			$_SESSION['cart'][$pid]['qty'] = $qty;
		}
	}
	function removeProduct($pid)
	{
		if(isset($_SESSION['cart'][$pid]))
		{
			unset($_SESSION['cart'][$pid]);
		}
	}
	function emptyProduct()
	{
		unset($_SESSION['cart']);
	}*/
?>








