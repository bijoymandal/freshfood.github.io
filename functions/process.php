	<?php
	include_once('functions.php');

if(isset($_POST)){
	$inputs=$_POST;

	foreach($inputs as $k=>$v){
		if($k!= "button"){
			$data[$k]=$v;
		}
		else{
			$action=$v;
		}
	}
		/*Add category*/
	if($action == "add_category")
	{
		$cat_name = $data['categoryName'];
		$cat_status = $data['categoryStatus'];
		echo addcategory($cat_name, $cat_status);
	}
	/*edit category */
	if($action == "getcategorydetail")
	{
		$cat_id = $data['CatID'];
		$cat_deatil= getcategorydetail($cat_id);
		echo json_encode($cat_deatil);
	}
	/*update category*/
	if($action == "update_category")
	{
		echo updatecategorydetail($data['categoryId'],$data['updcategoryName'],$data['updcategoryStatus']);
	}
	/*delete category*/
	if($action == "deletegategory")
	{
		$cat_id = $data['deleteid'];
		echo deletecategory($cat_id);
	}
	/*Active Category*/
	if($action == "activegategory")
	{
		$ID = $data['activeid'];
		$status = $data['status'];
		echo activecategory($ID, $status);
	}
	/*Add Inventory*/
	if($action =="add_supplier")
	{
		$prodname = $data['productName'];
		$pqty = $data['proquantity'];
		$punit = $data['prodUnit'];
		$oriprice = $data['oprice'];
		$sellprice = $data['sprice'];
		$supname = $data['suppliername'];
		echo addinventory($prodname,$pqty,$punit,$oriprice,$sellprice,$supname);
	}

	/*add sub category */
	if($action == "add_subcategory")
	{
		$sub_name = $data['subcategoryName'];
		$sub_status = $data['subcategoryStatus'];
		$sub_parent = $data['category'];
		echo getSubCategories($sub_parent, $sub_name, $sub_status);		
	}
	
	/*select sub category*/
	if($action == "getSubCategories"){
		$cat_id=$data['category_id'];
		$subCats= getSubCategoriesByCatID($cat_id);
		//print_r($subCats);
	}
	
	/*Select sub category*/
	if($action == "getSubCategoriesList"){
		$cat_id=$data['ProId'];
		$subCats= getSubCategoriesByCatID($cat_id);
		if(!empty($subCats)){
			$list='<div class="form-group"><select class="form-control category_id" name="category_id" ><option value="">~~SELECT~~</option>';
		foreach($subCats as $subCat){
			$list.='<option value='.$subCat['category_id'].'>'.$subCat['category_name'].'</option>';
		}
		$list.='</select></div>';
		echo $list;
		}else{
			echo "";
		}
	}
	/*Edit sub category*/
	if($action == "subcategorydetails")
	{
		$Subid = $data['SubID'];
		$subdetails = subcategorydetails($Subid);
		echo json_encode($subdetails);
	}
	
	//update product
	if($action == "update_product")
	{
		$prod_id = $data['Updproductid'];
		$cat_id = $data['updcategory_id'];
		$prodname = $data['updproductName'];
		$prodesc = $data['updproductdesc'];
		$pqty = $data['updqty'];
		$punit = $data['updprodUnit'];
		$oprice = $data['updoprice'];
		$sprice = $data['updsprice'];
		$supid = $data['updsup_id'];
		$sactive = $data['updprodStatus'];
		echo updproducts($prod_id,$cat_id,$prodname,$prodesc,$pqty,$punit,$oprice,$sprice,$supid,$sactive);
	}
	
	//update product image
	if($action == "update_product_img")
	{
		$prod_id = $data['editProductPhotoFooter'];
		echo updimage($prod_id);
	}
	/*Edit product*/
	if($action == "getproductdetail")
	{
		$prod_id = $data['PID'];
		$prod_details = getproductdetail($prod_id);
		echo json_encode($prod_details);
	}
	/*delete product*/
	if($action == "deleteproduct")
	{
		$prod_id = $data['deleteid'];
		echo deleteproduct($prod_id);	
	}
	
	/*Update subcategory*/
	if($action == "deletesubgategory")
	{
		$Sub_id = $data['deleteid'];
		echo deletesubgategory($Sub_id);	
	}
	//details product
	if($action == "detailproduct")
	{
		$detail_id = $data['detailid'];
		echo detailproduct($detail_id);
	}
	/*delete customer*/
	if($action == "deletecustomer")
	{
		$cust_id = $data['deleteid'];
		echo deletecustomer($cust_id);	
	}
	
	/*Add supplier*/
	if($action == "add_supplier")
	{
		$supplier_name = $data['supplierName'];
		$supp_ph = $data['suppliercontact'];
		$supp_add = $data['supplieraddress'];
		$supplier_status = $data['supplierStatus'];
		echo addsupplier($supplier_name,$supp_ph,$supp_add,$supplier_status);
	}
	/*Edit Supplier*/
	if($action == "getsupplierdetail")
	{
		$sup_id = $data['SupID'];
		$sup_deatil= getsupplierdetail($sup_id);
		echo json_encode($sup_deatil);
	}
	/*update Supplier*/
	if($action == "update_supplier")
	{
		echo updatesupplierdetail($data['updsupplierId'],$data['updsupplierName'],$data['updsuppliercontact'],$data['updsupplieraddress'],$data['updsupplierStatus']);
	}
	/*delete Supplier*/
	if($action == "deletesupplier")
	{
		$sup_id =$data['deleteid'];
		echo deletesupplier($sup_id);
	}
	
	/*Active Supplier*/
	if($action == "activesupplier")
	{
		$ID = $data['activeid'];
		$status = $data['status'];
		echo activesupplier($ID, $status);
	}
	if($action == "fetch"){
		echo fetch_image();
	}
	if($action == "Save"){
		$file = $data['bannername'];
		echo add_image($file);
	}
	if($action == "regiester")
	{
		$uname = $data['username'];
		$pass = $data['password'];
		$phone = $data['phone'];
		$email = $data['email'];
		$udetails = userregiester($uname,$pass,$phone,$email);
		echo json_encode($udetails);	
	}
	if($action == "login")
	{
		$logemail = $data['loginemail'];
		$logpass = $data['loginpassword'];
		echo userlogin($logemail,$logpass);
		//echo json_encode($logdetails);
	}
	/*if($action == "add_to_cart")
	{
		$pid = $data['prod_id'];
		$pqty = $data['qty'];
		echo addcartdetails($pid,$pqty);
	}
	if($action == "load_cart_items")
	{
		 echo loadcartdata();
	}*/

}
?>




















