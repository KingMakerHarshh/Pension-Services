<?php
   session_start();
         
   $EmailID=$_SESSION['UserID'];

   if (isset($_POST['btnupdate']))
   {
		   include_once "../DB/db.php";
      
			$NewPWD=$_POST['txtNewPWD'];
			$ConfirmPWD=$_POST['txtConfirmPWD'];
			
			$sql = "SELECT * FROM tbllogin WHERE UserID = '$EmailID' AND Password = '$NewPWD'";

			$ress=execute($sql);	
			$res=mysqli_num_rows($ress);
	
	
			if ($res>0) 
			{
				$sql="UPDATE tbllogin SET Password='$ConfirmPWD' where UserID= '$EmailID'";
				$ress=execute($sql);	
          
				echo "<script type='text/javascript'> alert('Password updated Successfully');</script>";
				echo "<meta http-equiv='refresh' content='0;url=Forgot.php'>";
			}
     
   else if($res > 0 && $UserType=="Users")
      {
          $_SESSION['UserType']=$UserType;
          $_SESSION['UserID']=$UserID;
              
       echo "<script type='text/javascript'> alert('Login Successfully');</script>";
       echo "<meta http-equiv='refresh' content='0;url=User/UserHome.php'>";
    }
    else
			{
			   echo "<script type='text/javascript'> alert('Enter Proper Current Password');</script>";
			   echo "<meta http-equiv='refresh' content='0;url=Forgot.php'>";
			}
      }
?>

 <?php
  include("MasterPages/Header.php");
  ?>



  <h1>Forgot Password</h1>

 
   
 <form id="frmchangePassword" name="frmchangePassword" method="post" action="">
           	<table id="minitable">
              <tr>
                	<td style="width:38%;">User ID</td>
					<td><input type="text" name="txtusername" maxlength="10"/></td>
                </tr>
            	<tr>
                	<td>New Password </td>
                    <td><input type="text" name="txtNewPWD" maxlength="6"/></td>
                </tr>
                
                <tr>
                	<td>New Password </td>
                    <td><input type="text" name="txtConfirmPWD" maxlength="6"/></td>
                </tr>
                
                  <tr>
                	  <td colspan="2" style="text-align:center;">
                 <Input type="submit" class="hide" name="btnupdate" value="Update" onclick="return check(frmchangePassword)" id="button"/>
                 <button type="button" name="btnBack" onClick="window.location.href='Login.php'">Back</button></td>
               </td>
                </tr>
                
                </table>
                </form>
                
             

                <?php
  include("MasterPages/Footer.php");
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