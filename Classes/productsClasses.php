<?php


include "DB.php";
class Product {
	public $id;
	public $name;
	public $image;
	public $type;
	public $price;
	//public $options;
	function __construct($id) {
		//$db_handle = new DB();
		$sql="SELECT * FROM products WHERE id=".$id;
		$result = mysqli_query($GLOBALS['con'],$sql);
		if($row=mysqli_fetch_array($result)){
			$this->id=$row['ID'];
			$this->name=$row['Name'];
			$this->image=$row['Image'];
			$this->type=$row['Type'];
			$this->price=$row['Price'];
			
		}
		else {

				$this->id="";
			$this->name="";
			$this->image="";
			$this->type="";
			$this->price="";
		}
		
	}

	static function getAllProducts()	{
	$products;
	$i=0;

	$sql="SELECT * from products";
	$result = mysqli_query($GLOBALS['con'],$sql);

	while($row=mysqli_fetch_array($result)){
		$products[$i++]=new Product($row[0]);
	}
	return $products;
	
	}
		static function getAllMenProducts()	{
	$products;
	$i=0;

	$sql="SELECT * from products WHERE Type ='Men'";
	$result = mysqli_query($GLOBALS['con'],$sql);
	
	if (!mysqli_num_rows ($result) == 0){
	while($row=mysqli_fetch_array($result)){
		$products[$i++]=new Product($row[0]);

		}
	return $products;
		}
	
	}
	
			static function getAllWomenProducts()	{
	$products;
	$i=0;

	$sql="SELECT * from products WHERE Type ='Women'";
	$result = mysqli_query($GLOBALS['con'],$sql);
if (!mysqli_num_rows ($result) == 0){
	while($row=mysqli_fetch_array($result)){
		$products[$i++]=new Product($row[0]);
		}
		return $products;
		}
	}
				static function getAllUniSexProducts()	{
	$products;
	$i=0;
	
	$sql="SELECT * from products WHERE Type ='Unisex'";
	$result = mysqli_query($GLOBALS['con'],$sql);
if (!mysqli_num_rows ($result) == 0){
	while($row=mysqli_fetch_array($result)){
		$products[$i++]=new Product($row[0]);
		}
		return $products;
		}
	}
	

			static function AddProduct($productname,$Categories,$Image,$img_name,$img_size,$tmp_name,$error,$Price)	{


		if ($error === 0) {
		if ($img_size > 7000000) {
			$em = "Sorry, your file is too large echo;.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
		
				$img_upload_path = '../../product-images/'.$img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				$sql= "insert into products (Image,Name,Type,Price) Values ('product-images/$img_name','$productname','$Categories','$Price')";
	
		
		if(mysqli_query($GLOBALS['con'],$sql))
			return true;
		else
			return false;
			
				header("Location: ../../index.php");
			}else {
				 echo "<div class='error'>Incorrect File Extension!</div>";
				
				

			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}
		
	
}

		static function NewOrder($Ordered_By,$product_id,$product_name,$Fabric,$Color,$PrintType,$img_name,$img_size,$tmp_name,$error,$Quantity,$AdditionalInfo,$deliveryTime)	{											

		
		if ($error === 0) {
		if ($img_size > 7000000) {
			$em = "Sorry, your file is too large echo;.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
		
				$img_upload_path = '../product-images/'.$img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
				$sql= "insert into orders (Ordered_By,product_name,Fabric,Color,PrintType,image,Quantity,AdditionalInfo,deliveryTime,Order_status,product_id) Values ('$Ordered_By','$product_name','$Fabric','$Color','$PrintType','product-images/$img_name','$Quantity','$AdditionalInfo','$deliveryTime','Pending','$product_id')";

		
		if(mysqli_query($GLOBALS['con'],$sql))
			return true;
		else
			return false;
			
				header("Location: ../../index.php");
			}else {
				 echo "<div class='error'>Incorrect File Extension!</div>";
				
				

			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index.php?error=$em");
	}
		
	
	}




		static function deleteProduct($productID){
			
		$sql= "DELETE FROM products WHERE ID =".$productID;
		$result=mysqli_query($GLOBALS['con'],$sql);
				if(mysqli_query($GLOBALS['con'],$sql)){
					
				
			return true;
		}
		else
			return false;
			//echo $sql;
	}




}

class ProductType {
	public $tid;
	public $ttype;
	

	//public $options;
	function __construct($id) {
		//$db_handle = new DB();
		$sql="SELECT * FROM printing WHERE id=".$id;
		$result1 = mysqli_query($GLOBALS['con'],$sql);
		if($row1=mysqli_fetch_array($result1)){
			$this->tid=$row1['ID'];
			$this->ttype=$row1['Type'];
			//$this->options=array();
		}
				else {

				$this->tid="";
			$this->ttype="";

		}
	}


	static function getAllTypes()	{
	$printing;
	$i=0;
	//$db_handle=new DB();
	$sql="SELECT * from printing";
	$result = mysqli_query($GLOBALS['con'],$sql);
	while($row=mysqli_fetch_array($result)){
		$printing[$i++]=new ProductType($row[0]);
	}
	return $printing;
	}
}

class Orders {
	public $id;
	public $Ordered_By;
	public $product_name;
	public $Fabric;
	public $Color;
	public $PrintType;
	public $Image;
	public $Quantity;
	public $AdditionalInfo;
	public $deliveryTime;
	public $OrderDate;
	public $Orderstatus;
	//

	//public $options;
	function __construct($id) {
		//$db_handle = new DB();
		$sql="SELECT * FROM orders WHERE id=".$id;
		$result1 = mysqli_query($GLOBALS['con'],$sql);
		if($row1=mysqli_fetch_array($result1)){
			$this->id=$row1['ID'];
			$this->Ordered_By=$row1['Ordered_By'];
			$this->product_name=$row1['product_name'];
			$this->Fabric=$row1['Fabric'];
			$this->Color=$row1['Color'];
			$this->PrintType=$row1['PrintType'];
			$this->Image=$row1['image'];
			$this->Quantity=$row1['Quantity'];
			$this->AdditionalInfo=$row1['AdditionalInfo'];
			$this->deliveryTime=$row1['deliveryTime'];
			$this->OrderDate=$row1['Order_date'];
			$this->Orderstatus=$row1['Order_status'];


	
		}
	}


	static function getMyOrders($UID)	{
	$products=[];
	$i=0;
	
	$sql="SELECT * from orders WHERE Ordered_By ='$UID'";
	$result = mysqli_query($GLOBALS['con'],$sql);
	
	while($row=mysqli_fetch_array($result)){
		$products[$i++]=new Orders($row[0]);
	}
	return $products;
	
	}
		static function Admin_Orders()	{
	$products=[];
	$i=0;
	
	$sql="SELECT * from orders ";
	$result = mysqli_query($GLOBALS['con'],$sql);
	
	while($row=mysqli_fetch_array($result)){
		$products[$i++]=new Orders($row[0]);
	}
	return $products;
	
	}
		static function Acceptorder($OrderID){

			$sql= "UPDATE orders SET Order_status = 'Accepted' where ID='$OrderID'";
			if(mysqli_query($GLOBALS['con'],$sql)){

				return true;
				header('location: admin_panel_orders_action.php.php');
			}
			else
			return false;
		}

			static function DenyOrder($OrderID){

			$sql= "UPDATE orders SET Order_status = 'Denied' where ID='$OrderID'";
			if(mysqli_query($GLOBALS['con'],$sql)){

				return true;
				header('location: admin_panel_orders_action.php.php');
			}
			else
			return false;
		}
				static function deleteOrder($OrderID){
			
		$sql= "DELETE FROM orders WHERE ID =".$OrderID;
		$result=mysqli_query($GLOBALS['con'],$sql);
				if(mysqli_query($GLOBALS['con'],$sql)){
					
				
			return true;
		}
		else
			return false;
			//echo $sql;
	}
}

?>