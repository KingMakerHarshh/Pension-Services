<?php
session_start();
$Mobile=$_SESSION['UserID'];

include_once "../DB/db.php";
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	$sql = "SELECT * FROM tblusers where Mobile='$Mobile'";

	$result=execute($sql);	
	
	if($row = $result->fetch_assoc())
 	{
 		$ID=$row['ID'];
		$Name=$row['Name'];
		$Aadhaar=$row['Aadhaar'];
		$Address=$row['Address'];
		$State=$row['State'];
        $City=$row['City'];
		$Mobile=$row['Mobile'];
		$EmailID=$row['EmailID'];
		$Category=$row['Category'];
	}
?>


<?php


if (isset($_POST['btnupdate']))
{
	$Name=$_POST['txtName'];
	$Aadhaar=$_POST['txtAadhaar'];
	$Address=$_POST['txtAddress'];
    $EmailID=$_POST['txtEmailID'];
    
			
	 $sql="UPDATE tblusers SET Name='$Name',Aadhaar='$Aadhaar',Address='$Address',EmailID='$EmailID' where Mobile='$Mobile'";
	    	
	$res=execute($sql);	
		
	if($res)
	{
	
		echo "<script type='text/javascript'> alert('Updated Successfully');</script>";
		echo "<meta http-equiv='refresh' content='0;url=UserInfo.php'>";
	}
}

	
	
?>



  <?php
  include("../MasterPages/UserHeader.php");
  ?>
  
  <h3>User Details Page</h3>
  
            
<form id="frminfo" name="frminfo" method="post" action="" enctype="multipart/form-data">
           	<table id="minitable">
            
					
				<tr>
                	<td>Name</td>
                    <td><label id="l2"><?php echo $Name; ?></label>
					 <input type="text" name="txtName" maxlength="100" class="hide" value="<?php echo $Name; ?>"/>
					</td>
                </tr>
				
				<tr>
                	<td>Aadhaar </td>
                    <td><label id="l3"><?php echo $Aadhaar; ?></label>
					 <input type="text" name="txtAadhaar" maxlength="100" class="hide" value="<?php echo $Aadhaar; ?>"/>
					</td>
                </tr>
				
                	
				<tr>
                	<td>Address </td>
                    <td><label id="l4"><?php echo $Address; ?></label>
                    <textarea type="text" name="txtAddress" style="height:100px;" class="hide"><?php echo $Address; ?></textarea>
					</td>
                </tr>
				
				 <tr>
                	<td>City</td>
					<td><?php echo $City; ?>		
					</td>
                </tr>
				
				  <tr>
                	<td>State</td>
					<td> <?php echo $State; ?>
					</td>
                </tr>
				
				  <tr>
                	<td>Mobile</td>
					<td><?php echo $Mobile; ?></td>
                </tr>
				
				  <tr>
                	<td>Email ID</td>
					<td><label id="l8"><?php echo $EmailID; ?></label>
					<input type="text" name="txtEmailID" maxlength="100" class="hide" value="<?php echo $EmailID; ?>"/>
					</td>
                </tr>
				
                <tr>
                	<td>Category</td>
					<td><?php echo $Category; ?></td>
                </tr>
				
				
               <tr>
                	  <td>
                      
                 <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frminfo)" id="button"/></td>
                 <td>
               <button type="button" name="btnedit" onclick="addInput(this.form);" id="button">Edit</button>
              
               <button type="button" class="hide" name="btncancel" onclick="reloadPage()" id="button" >Cancel</button>
                </td>
                </tr>
                   
				
			
			
           </table>
           </form>
         
  
  
    <?php
  include("../MasterPages/Footer.php");
  ?>
  
  <style type="text/css">
input {display:block;}
.hide {display:none;} 

textarea {display:block;}
</style>



<script language="javascript">
function check(f)
{

if(f.txtName.value.trim()=="")
{
alert("This Name field can not be empty");
f.txtName.focus();
return false ;
}
else if (f.txtAadhaar.value.trim()=="")
{
alert("This Aadhaar field can not be empty");
f.txtAadhaar.focus();
return false ;
}
else if (f.txtAddress.value.trim()=="")
{
alert("This Address field can not be empty");
f.txtAddress.focus();
return false ;
}

else if (f.txtEmailID.value.trim()=="" || checkemail(f.txtEmailID)==false)
{
alert("This EmailID field can not be empty");
f.txtEmailID.focus();
return false ;
}

else
return true;
}
</script>
