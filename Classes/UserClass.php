
<?php
include "DB.php";


 
class User
{

	public $FName;
	public $LName;
	public $Phone;
	public $Company;
	public $Password;
	public $UserType_obj;
	public $ID;
	public $Email;

	
	function __construct($id)	{
		if ($id !=""){
			$sql="select * from users where 	ID=$id";
			$User = mysqli_query($GLOBALS['con'],$sql);
			if ($row = mysqli_fetch_array($User)){
				$this->FName=$row["FName"];
				$this->LName=$row["LName"];
				$this->Phone=$row["Phone"];
				$this->Company=$row["Company"];
				$this->Password=$row["Password"];
				$this->ID=$row["ID"];
				$this->Email=$row["Email"];
				$this->UserType_obj=new UserType($row["UserType_id"]);
			}
		}
	}

	static function isEmailExist($Email)	{
		$email=[];
	$i=0;
	$sql="SELECT * FROM users WHERE Email='$Email'";
	$result = mysqli_query($GLOBALS['con'],$sql);
	while($row=mysqli_fetch_array($result)){
			$email[$i++]=new User($row[0]);
			
			return true;
		}
		
		
		}
	


	static function login($UserName,$Password){
		
		
		$xPassword =md5($Password);
		$sql= "SELECT * FROM users WHERE Email='$UserName' AND Password ='$xPassword' ";
		$result=mysqli_query($GLOBALS['con'],$sql);
		if($row=mysqli_fetch_array($result))
			
		{	

			return new User($row[0]);



		
	}else
		{

		return NULL;
			}
	}




	static function SelectAllUsersInDB(){

				$sql="select * from users";
		$Users = mysqli_query($con,$sql);
		$i=0;
		$Result;
		while ($row = mysql_fetch_array(Users)){
			$MyObj= new User($row["ID"]);
			$Result[$i]=$MyObj;
			$i++;
		}
		return $Result;
	}
		static function UpdateUserSettingsWithOutPass($FName,$LName,$Phone,$Company,$Email,$UserID){

			$sql= "UPDATE users SET FName = '$FName', LName = '$LName', Phone = '$Phone', Company = '$Company' ,Email= '$Email'  where ID='$UserID'";
	
			if(mysqli_query($GLOBALS['con'],$sql)){

				return true;
				header('location: ProfileSettings.php');
			}
			else
			return false;
		}
			static function CheckCurrentPassword($UserID,$Password){
						$email=[];
						$i=0;
				
				$xPassword =md5($Password);
				$sql= "SELECT Password FROM users WHERE ID='$UserID'";
				$result=mysqli_query($GLOBALS['con'],$sql);
				if($row=mysqli_fetch_array($result))
					
				{	

		
					if($xPassword==$row[0]){
		
						return true;
					}
					else echo "<div class='error'>Current password incorrect</div>";
				
			}
			else		
			{
				
				return NULL;
					}
		}

	
			static function UpdateUserPassword($PasswordNew1,$PasswordNew2,$currentpassword,$UserID){
				if($PasswordNew1==$PasswordNew2){
				
				$PasswordNew1 = md5($PasswordNew1);
			$sql= "UPDATE users SET Password = '$PasswordNew1'  where ID='$UserID'";

			if(mysqli_query($GLOBALS['con'],$sql)){

				return true;
				header('location: ProfileSettings.php');
			}
			else
			{return false;}
		}
		else { echo "<div class='error'>Passwords are not matched.</div>";}
	}
		
	
	
	static function deleteUser($ObjUser){
			
		$sql= "DELETE FROM users WHERE ID =".$ObjUser->ID;
		$result=mysqli_query($GLOBALS['con'],$sql);
				if(mysqli_query($GLOBALS['con'],$sql)){
		
				
			return true;}
		else
			return false;
			
	}
		static function AdmindeleteUser($ObjUser){
			
		$sql= "DELETE FROM users WHERE ID =".$ObjUser;
		$result=mysqli_query($GLOBALS['con'],$sql);
				if(mysqli_query($GLOBALS['con'],$sql)){
		
				
			return true;}
		else
			return false;
		
	}
		static function SelectAllInDB()	{
	$products;
	$i=0;
	//$db_handle=new DB();
	$sql="SELECT * from users  ";
	$result = mysqli_query($GLOBALS['con'],$sql);
	while($row=mysqli_fetch_array($result)){
		$products[$i++]=new User($row[0]);
	}
	return $products;
	}

			static function SelectAllAdminsInDB()	{
	$products;
	$i=0;
	//$db_handle=new DB();
	$sql="SELECT * from users WHERE UserType_id='1' ";
	$result = mysqli_query($GLOBALS['con'],$sql);
	while($row=mysqli_fetch_array($result)){
		$products[$i++]=new User($row[0]);
	}
	return $products;
	}



	
	
	static function InsertinDB_Static($FName,$LName,$PW,$Phone,$Company,$Email)	{
		$PW = md5($PW);
		$sql= "insert into users (FName,LName,Phone,Company,Password,Email,UserType_id) Values ('$FName','$LName','$Phone','$Company','$PW','$Email',2)";
		
		
		if(mysqli_query($GLOBALS['con'],$sql)){
			header('location: login.php');
			return true;}
		else
			{return false;}
	
}
	static function InsertAdmininDB_Static($FName,$LName,$PW,$Email)	{
		$PW = md5($PW);
		$sql= "insert into users (FName,LName,Phone,Company,Password,Email,UserType_id) Values ('$FName','$LName','','','$PW','$Email',1)";
		
		
		if(mysqli_query($GLOBALS['con'],$sql))
			return true;
		else
			return false;
	
}
	
	
	function UpdateMyDB(){
				$sql="update users set UserName='".$this->UserName."' ,Password='$this->Password' where ID=".$this->ID."";
		if(mysqli_query($GLOBALS['con'],$sql))
			return true;
		else
			return false;	
	}	
}
class UserType {
	public $ID;
	public $UserTypeName;
	public $ArrayOfPages;
	function __construct($id){
		if ($id !=""){
			$sql="select * from usertypes where ID=$id";
			$result=mysqli_query($GLOBALS['con'],$sql);
			if ($row = mysqli_fetch_array($result))	{
				$this->UserTypeName=$row["Name"];
				$this->ID=$row["ID"];

				$i=0;

			}
		}
	}
	
	


}


?>