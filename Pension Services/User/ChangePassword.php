<?php
   session_start();
         
   $EmailID=$_SESSION['UserID'];

   if (isset($_POST['btnupdate']))
   {
		   include_once "../DB/db.php";
      
			$CurrentPWD=$_POST['txtCurrentPWD'];
			$NewPWD=$_POST['txtNewPWD'];
			
			$sql = "SELECT * FROM tbllogin WHERE UserID = '$EmailID' AND Password = '$CurrentPWD'";

			$ress=execute($sql);	
			$res=mysqli_num_rows($ress);
	
	
			if ($res>0) 
			{
				$sql="UPDATE tbllogin SET Password='$NewPWD' where UserID= '$EmailID'";
				$ress=execute($sql);	
				
				echo "<script type='text/javascript'> alert('Password updated Successfully');</script>";
				echo "<meta http-equiv='refresh' content='0;url=ChangePassword.php'>";
			}
			else
			{
			   echo "<script type='text/javascript'> alert('Enter Proper Current Password');</script>";
			   echo "<meta http-equiv='refresh' content='0;url=ChangePassword.php'>";
			}
	}
?>

<?php
 include("../MasterPages/UserHeader.php");
?>


  <h1>Change Password</h1>

 
   
 <form id="frmchangePassword" name="frmchangePassword" method="post" action="">
           	<table id="minitable">
            	<tr>
                	<td>Current Password </td>
                    <td><input type="text" name="txtCurrentPWD" maxlength="6"/></td>
                </tr>
                
                <tr>
                	<td>New Password </td>
                    <td><input type="text" name="txtNewPWD" maxlength="6"/></td>
                </tr>
                
                  <tr>
                	<td>Confirm Password </td>
                    <td><input type="text" name="txtConfirmPWD" maxlength="6"/></td>
                </tr>
                
                
                  <tr>
                	  <td colspan="2" style="text-align:center;">
                 <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frmchangePassword)" id="button"/></td>
                </td>
                </tr>
                
                </table>
                </form>
                
             

<?php
  include("../MasterPages/Footer.php");
?>
  
  <script language="javascript">
function check(f)
{
if(f.txtCurrentPWD.value=="")
{
   alert("This Current Password field can not be Empty");
   f.txtCurrentPWD.focus();
   return false ;
}
else if(f.txtNewPWD.value=="")
{
   alert("This New Password field can not be Empty");
   f.txtNewPWD.focus();
   return false ;
}
else if(f.txtConfirmPWD.value=="")
{
   alert("This Confirm Password field can not be Empty");
   f.txtConfirmPWD.focus();
   return false ;
}
else if(f.txtConfirmPWD.value!=f.txtNewPWD.value)
{
   alert("New Password and Confirm Password should be same");
   f.txtConfirmPWD.focus();
   return false ;
}
else
return true;
}
</script>