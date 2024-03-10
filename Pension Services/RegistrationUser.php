<?php

include_once "DB/db.php";

  include("MasterPages/Header.php");
?>


<h1>User Registration Page</h1>

<form id="frm" name="frm" method="post" action="">

<table id="minitable">
            	<tr>
                	<td style="width:38%;">Name</td>
					<td><input type="text" name="txtUserName" maxlength="100" value="<?php echo isset($_POST['txtUserName']) ? $_POST['txtUserName'] : ''; ?>"/></td>
                </tr>

                <tr>
                	<td style="width:38%;">Aadhaar</td>
					<td><input type="text" name="txtAadhaar" onfocus="disp1();" maxlength="12" onKeyPress="return numbersonly(event, false)" value="<?php echo isset($_POST['txtAadhaar']) ? $_POST['txtAadhaar'] : ''; ?>"/></td>
                </tr>

               
                <tr>
            	<td>Address</td>
                <td><textarea type="text" name="txtAddress" onfocus="disp2();" style="height:100px"><?php echo isset($_POST['txtAddress']) ? $_POST['txtAddress'] : ''; ?></textarea></td>
           		 </tr>
              
				
                <tr>
            <td>State</td>
            <td>
    			 <select name="cmbState" onChange="check1()">
        		    <option value="0">Select</option>
      			
                    <?php
					   	$sql = "SELECT distinct(name) FROM tbl_states";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbState']) ? (($_REQUEST['cmbState']== $result['name']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['name']?>"><?php echo $result['name'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>

                        </select>
                        </td>
            </tr>

			<?php
			if(isset($_REQUEST['cmbState']))
	{
		if($_REQUEST['cmbState']!='0')
		{

            $sql = "SELECT distinct(id) FROM tbl_states where name='". $_REQUEST['cmbState']."'";
    	   	$result = execute($sql);
               if($row = $result->fetch_assoc())
               {
                   $ID=$row['id'];
               }
		?>

            <tr>
            <td>City</td>
            <td>
           
    			 <select name="cmbCity">
        		    <option value="0">Select</option>

      				<?php
					   	$sql = "SELECT distinct(name) FROM tbl_cities where state_id = '$ID'";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbCity']) ? (($_REQUEST['cmbCity']== $result['name']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['name']?>"><?php echo $result['name'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>
                        </select>
                          
                        </td>
            </tr>

            <?php
	    }
    }
?>				
				 
                <tr>
                	<td>Mobile</td>
					<td><input type="text" name="txtMobile" maxlength="10"  onfocus="disp3();" onKeyPress="return numbersonly(event, false)" value="<?php echo isset($_POST['txtMobile']) ? $_POST['txtMobile'] : ''; ?>"/></td>
                </tr>
				
				<tr>
                	<td>Email ID</td>
					<td><input type="text" name="txtEmailID" maxlength="100" onfocus="disp4();" value="<?php echo isset($_POST['txtEmailID']) ? $_POST['txtEmailID'] : ''; ?>" /></td>
                </tr>


                <tr>
            <td>Category</td>
            <td>
    			 <select name="cmbCategory">
        		    <option value="0">Select</option>
      			
                    <?php
					   	$sql = "SELECT distinct(Category) FROM tblcategories";
    	   				$query_result = execute($sql);
					   	while($result = mysqli_fetch_assoc($query_result))
        				{
	  			       		?>
				            <option <?php echo (isset($_REQUEST['cmbCategory']) ? (($_REQUEST['cmbCategory']== $result['Category']) ? "Selected" : "") : "")  ?> value = "<?php echo $result['Category']?>"><?php echo $result['Category'] ?></option>
                                                        
        				<?php
        		
							}
					
						?>

                        </select>
                        </td>
            </tr>

                <tr>
                	<td colspan="2" style="text-align:center;">
                     <input type="submit" name="btnRegister" onClick="return check(frm)" value="Register" />
					 
					 <button type="button" name="btnBack" onClick="window.location.href='Login.php'">Back</button>
                    </td>
                </tr>
                   
           </table>

</form>


<?php
include("MasterPages/Footer.php");
?>




<?php
if(isset($_REQUEST['btnRegister']))
{

    $UserName=$_POST['txtUserName'];
	$Aadhaar=$_POST['txtAadhaar'];
    $Address=$_POST['txtAddress'];
	$State=$_POST['cmbState'];
	$City=$_POST['cmbCity'];
    $Mobile=$_POST['txtMobile'];
    $EmailID=$_POST['txtEmailID'];
    $Category=$_POST['cmbCategory'];

    $sql = "SELECT * FROM tbllogin WHERE UserID = '$Mobile'";
    $ress=execute($sql);	
    $res=mysqli_num_rows($ress);
    
    if ($res>0) 
	{
        echo "<script type='text/javascript'> alert('Mobile already Registered');</script>";
    }
    else
    {

        $sql="INSERT INTO `tblusers`(`Name`,`Aadhaar`, `Address`, `State`, 
        `City`, `Mobile`, `EmailID`, `Category`) VALUES ('$UserName',
        '$Aadhaar','$Address', '$State', '$City', '$Mobile', 
        '$EmailID', '$Category')";
		$res=execute($sql);	
    
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $VerificationCode = substr(str_shuffle( $chars ), 0, 6);
        
        $mobileno=$Mobile;
        $str="Dear User, Your have registered successfully. Your User ID is ".$Mobile." and Password is ".$VerificationCode. " cbmSMS";
        
        $sql="INSERT INTO `tbllogin`(`UserID`, `Password`, `UserType`) VALUES ('$Mobile','$VerificationCode','Users')";
		
		$res=execute($sql);	
        
        
        if($res)
        {
            include_once "SMS/SendSMS.php";
            $res=sendSMS($mobileno,$str);
        
            echo "<script type='text/javascript'> alert('Successfully Registered.');</script>";
            echo "<meta http-equiv='refresh' content='0;url=Login.php'>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Action is not processed');</script>";
        }
    }
}
?>



<script language="javascript">
function check(f)
{

if(f.txtUserName.value.trim()=="")
{
alert("This Name field can not be empty");
f.txtUserName.focus();
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
else if (f.cmbState.value.trim()=="0")
{
alert("This State field can not be empty");
f.cmbState.focus();
return false ;
}
else if (f.cmbCity.value.trim()=="0")
{
alert("This City field can not be empty");
f.cmbCity.focus();
return false ;
}
else if (f.txtMobile.value.trim()=="" || checkmobile(f.txtMobile)==false)
{
alert("This Mobile field can not be empty");
f.txtMobile.focus();
return false ;
}

else if (f.txtEmailID.value.trim()=="" || checkemail(f.txtEmailID)==false)
{
alert("This Email ID field can not be empty");
f.txtEmailID.focus();
return false ;
}
else if (f.cmbCategory.value.trim()=="0")
{
alert("This Category field can not be empty");
f.cmbCategory.focus();
return false ;
}
else
return true;
}

function disp1()
 {
	 a=frm.txtUserName.value;
	 if(a.length<1)
	 {
		 alert("This Name field cannot be empty");
		 frm.txtUserName.focus();
	 }
 }
 
 function disp2()
 {
	 a=frm.txtAadhaar.value;
	 if(a.length<1)
	 {
		 alert("This Aadhaar field cannot be empty");
		 frm.txtAadhaar.focus();
	 }
 }
 function disp3()
 {
	 a=frm.txtAddress.value;
	 if(a.length<1)
	 {
		 alert("This Address field cannot be empty");
		 frm.txtAddress.focus();
	 }
 }
 function disp4()
 {
	 a=frm.txtMobile.value;
	 if(a.length<1)
	 {
		 alert("This Mobile field cannot be empty");
		 frm.txtMobile.focus();
	 }
 }
 function disp5()
 {
	 a=frm.txtEmailID.value;
	 if(a.length<1)
	 {
		 alert("This Email field cannot be empty");
		 frm.txtEmailID.focus();
	 }
 }
</script>

<script type="text/javascript">
function check1() {
     document.frm.submit()
}
</script>